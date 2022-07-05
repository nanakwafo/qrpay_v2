<?php

namespace App\Http\Controllers;

use App\Amountsetting;
use App\Helpers\Subscriptionolliepay;
use App\Http\Requests\QrcodeRequest;
use App\Qrcode;

use App\User;
use Illuminate\Support\Facades\Response as Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Sentinel;
use File;


class QrcodeController extends Controller
{

    public function index($platformId = '', $qrcodeId = '', Request $request)
    {


        if (empty($platformId)) {
            #return to 404 if platform does not exit
            if (empty($request->sort)) {
                return abort(404);
            } else {
                $platformId = $request->platformId;
                switch (trim($request->sort)) {

                    case 'active':
                        return view('userpanel.qrcodes', [
                            'platformId' => $platformId,
                            'qrcodes' => Qrcode::where('platformId', $platformId)->where('status', 'valid')->paginate(6),
                            'details' => $this->profileDetails($platformId),
                            'userOnboardStatus' => $this->userOnboardStatus($platformId),
                            'active' => 'selected'
                        ]);
                        break;

                    case 'inactive':
                        return view('userpanel.qrcodes', [
                            'platformId' => $platformId,
                            'qrcodes' => Qrcode::where('platformId', $platformId)->where('status', 'invalid')->paginate(6),
                            'details' => $this->profileDetails($platformId),
                            'userOnboardStatus' => $this->userOnboardStatus($platformId),
                            'inactive' => 'selected'
                        ]);
                        break;

                    case 'all':
                        return view('userpanel.qrcodes', [
                            'platformId' => $platformId,
                            'qrcodes' => Qrcode::where('platformId', $platformId)->paginate(6),
                            'details' => $this->profileDetails($platformId),
                            'userOnboardStatus' => $this->userOnboardStatus($platformId),
                            'all' => 'selected'
                        ]);
                        break;
                }


            }

        }


        if (empty($qrcodeId)) {
            return view('userpanel.qrcodes', [
                'platformId' => $platformId,
                'qrcodes' => Qrcode::where('platformId', $platformId)->paginate(6),
                'details' => $this->profileDetails($platformId),
                'userOnboardStatus' => $this->userOnboardStatus($platformId)
            ]);
        } else {
            return view('userpanel.qrcodemanage', [
                'platformId' => $platformId,
                'qrcodes' => Qrcode::where('platformId', $platformId)->where('id', $qrcodeId)->first(),
                'qrcodeAmounts' => Amountsetting::where('platformId', $platformId)->where('qrcode_id', $qrcodeId)->get(),
                'qrcodeId' => $qrcodeId,
                'details' => $this->profileDetails($platformId),
                'userOnboardStatus' => $this->userOnboardStatus($platformId)
            ]);
        }


    }

    public function createQrcode($platformId = '')
    {
        return view('userpanel.createQrcode', [
            'platformId' => $platformId,
            'details' => $this->profileDetails($platformId),
            'userOnboardStatus' => $this->userOnboardStatus($platformId)
        ]);
    }

    public function searchQrcode(Request $request)
    {
        $searchName = $request->search_qrcode_name;
        $platformId = $request->platformId;
        $data = null;
        if ($searchName != '') {
            $resources = Qrcode::where('brand_name', 'LIKE', '%' . $searchName . '%')->where('platformId', $platformId)->paginate(6);

            $resources->appends(request()->except('page'))->links();
            if (count($resources) > 0) {
                $data = $resources;
            }
        } else {
            $resources = Qrcode::where('platformId', $platformId)->paginate(6);
            $data = $resources;
        }
        return view('userpanel.qrcodes', [
            'platformId' => $platformId,
            'qrcodes' => $data,
            'details' => $this->profileDetails($platformId),
            'userOnboardStatus' => $this->userOnboardStatus($platformId)
        ]);
    }

    public function generateQrCode(QrcodeRequest $request)
    {

        $platformId = trim($request->qrCodegeneratorForm_platformId);


        #validate request
        $validated = $request->validated();
        #this will return a json response if there is a validation error


        $collectionName = $request->collectionName;
        $amount = $request->amount;
        $companyreg = $request->companyreg;

        if ($files = $request->file('collectionFile')) {

            //get file
            $actualFile = $request->file('collectionFile');

            //get file name
            $filename = time() . '.' . $actualFile->getClientOriginalName();

            //store image
            Image::make($actualFile)->resize(300, 300)->save(public_path('/uploads/' . $filename));



            #if one operation fails do not perform entire actions
            DB::transaction(function () use ($platformId, $filename, $collectionName, $amount,$companyreg) {
                # store file in database
               $user =User::find(Sentinel::getUser()->id) ;
                $qrcode = new Qrcode();
                $qrcode->platformId = $platformId;
                $qrcode->logo = $filename;
                $qrcode->brand_name = $collectionName;
                $qrcode->companyreg = $companyreg;
                $qrcode->status = 'valid';
                $qrcode->url = 'https://qrcodepayments-qrcodes.s3-ap-southeast-2.amazonaws.com/qrcodes/' . $filename;
               $user->qrcodes()->save($qrcode);
                //$qrcode->save();


                //generate qrcode and store
                \QrCode::format('png')
                    ->merge(public_path('/uploads/' . $filename), 0.3, true)
                    ->size(200)
                    ->errorCorrection('H')
                    ->generate('https://qrcodepay.nanalabs.co.uk/pay/'.$platformId.'/'.$qrcode->id, public_path('/uploads/' . $filename));

                # get s3 object make sure your key matches with
                # config/filesystem.php file configuration
                $s3 = \Storage::disk('s3');

                # define s3 target directory to upload file to
                $s3filePath = '/qrcodes/' . $filename;

                # finally upload your file to s3 bucket
                $s3->put($s3filePath, file_get_contents(public_path('/uploads/' . $filename)), 'public');




                #store amount
                $amountArray = explode(',', $amount);
                foreach ($amountArray as $amount) {
                    Amountsetting::create([
                        'platformId' => $platformId, //from stripe
                        'amount' => $amount,
                        'qrcode_id' => $qrcode->id
                    ]);
                }


                #unsubscribe vender after creating code for the first time
//                Subscriptionolliepay::unsubscribeForMultipleQrCode($platformId);

            });
            #remove file from public directory

            #response when  generating qrcodes is a success
            return Response()->json(1);


        }
        #response when no photo is added to request
        return Response()->json(2);


    }

    public function updateQrCode(Request $request)
    {

        $platformId = trim($request->qrCodegeneratorForm_platformId);
        $collectionName = $request->collectionName;
        $amount = $request->amount;
        $qrcodeId = $request->qrcodeId;
        $companyreg = $request->companyreg;



        if ($files = $request->file('collectionFile')) {

            //get file
            $actualFile = $request->file('collectionFile');

            //get file name
            $filename = time() . '.' . $actualFile->getClientOriginalName();

            //store image
            Image::make($actualFile)->resize(300, 300)->save(public_path('/uploads/' . $filename));

            #if one operation fails do not perform entire actions
            DB::transaction(function () use ($platformId, $filename, $collectionName, $amount, $qrcodeId ,$companyreg) {
                # update file in database
                $qrcode = Qrcode::findOrFail($qrcodeId);
                $qrcode->logo = $filename;
                $qrcode->brand_name = $collectionName;
                $qrcode->companyreg = $companyreg;
                $qrcode->url = 'https://qrcodepayments-qrcodes.s3-ap-southeast-2.amazonaws.com/qrcodes/' . $filename;
                $qrcode->save();




                //generate qrcode and store
                \QrCode::format('png')
                    ->merge(public_path('/uploads/' . $filename), 0.3, true)
                    ->size(200)
                    ->errorCorrection('H')
                    ->generate('https://qrcodepay.nanalabs.co.uk/pay/'.$platformId.'/'.$qrcode->id, public_path('/uploads/' . $filename));

                # get s3 object make sure your key matches with
                # config/filesystem.php file configuration
                $s3 = \Storage::disk('s3');

                # define s3 target directory to upload file to
                $s3filePath = '/qrcodes/' . $filename;

                # finally upload your file to s3 bucket
                $s3->put($s3filePath, file_get_contents(public_path('/uploads/' . $filename)), 'public');

                if(!empty($amount)) {
                    #delete all amount first
                    Amountsetting::where('qrcode_id', $qrcodeId)->delete();
                    #store amount
                    $amountArray = explode(',', $amount);
                    foreach ($amountArray as $amount) {
                        Amountsetting::create([
                            'platformId' => $platformId, //from stripe
                            'amount' => $amount,
                            'qrcode_id' => $qrcodeId
                        ]);
                    }
                }

            });
            #remove file from public directory

            #response when  generating qrcodes is a success
            return Response()->json(1);


        }

        //request has no new file
        DB::transaction(function () use ($platformId, $collectionName, $amount, $qrcodeId,$companyreg) {
            # update file in database

            $qrcode = Qrcode::findOrFail($qrcodeId);
            $qrcode->brand_name = $collectionName;
            $qrcode->companyreg = $companyreg;
            $qrcode->save();

            if(!empty($amount)){
                #delete all amount first
                Amountsetting::where('qrcode_id', $qrcodeId)->delete();
                #store amount
                $amountArray = explode(',', $amount);
                foreach ($amountArray as $amount) {
                    Amountsetting::create([
                        'platformId' => $platformId, //from stripe
                        'amount' => $amount,
                        'qrcode_id' => $qrcodeId
                    ]);
                }
            }


        });
        #remove file from public directory
        #response when  generating qrcodes is a success
        return Response()->json(1);


    }

    public function deleteQrcode(Request $request)
    {
        try {
            $qrcode = Qrcode::find($request->qrcodeId);
            $qrcode->status = 'invalid';
            $qrcode->save();
            return Response()->json(1);

        } catch (\Exception $exception) {
            return Response()->json(0);
        }

    }
    public function activateQrcode(Request $request)
    {
        try {
            $qrcode = Qrcode::find($request->qrcodeId);
            $qrcode->status = 'valid';
            $qrcode->save();
            return Response()->json(1);

        } catch (\Exception $exception) {
            return Response()->json(0);
        }

    }

    public function qrcodeDownload($id = '')
    {
        if (empty($id))
             abort(404);

        $filename = 'qrcode.png';
        $tempfile = tempnam(sys_get_temp_dir(), $filename);
        try {
            $url = Qrcode::where('id', $id)->pluck('url')->first();
            #  replace empty spaces in url with +
            $url = preg_replace('/\s+/', '+', $url);
            copy(trim($url), $tempfile);
            return response()->download($tempfile, $filename);
        } catch (Exception $exception) {
            abort(500);
        }


    }


}
