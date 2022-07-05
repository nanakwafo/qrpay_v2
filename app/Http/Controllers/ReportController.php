<?php

namespace App\Http\Controllers;

use App\Helpers\Stripeuser;
use App\Qrcode;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    //

    public function indexqrcodes($platformId = '')
    {

        #return to 404 if platform does not exit
        if (empty($platformId))
            return abort(404);

        return view('userpanel.reports', [
            'platformId' => $platformId,
            'qrcodes' => Qrcode::where('platformId', $platformId)->get(),
            'details' => $this->profileDetails($platformId),
            'userOnboardStatus'=>$this->userOnboardStatus($platformId)
        ]);
    }


    public function reports(Request $request)
    {
        $platformId = trim($request->platformId);
        $qrcodeId = trim($request->qrcodeId);
        DB::statement(DB::raw('set @rownum=0'));
       if(!empty($qrcodeId)){
           $users = DB::table('transactions')->where(['platformId' => $platformId, 'qrcode_id' => $qrcodeId])
               ->select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'id','accountId', 'payer_name', 'payer_email','amount', 'created_at', 'updated_at']);
       }else{
           $users = DB::table('transactions')->where(['platformId' => $platformId])
               ->select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'id', 'accountId','payer_name', 'payer_email','amount', 'created_at', 'updated_at']);
       }
        return Datatables::of($users)->make();
    }
    public function transactiontotalqrcode(Request $request){
        if(empty($request->qrcodeId)){
           return  $total = DB::table('transactions')->where('platformId',$request->platformId)->sum('amount');
        }else{
            return  $total = DB::table('transactions')->where('qrcode_id',$request->qrcodeId)->where('platformId',$request->platformId) ->sum('amount');
        }

    }

    public function piechartData(Request $request)
    {

        $platformId = $request->platformId;

        $dataset = [];
        #hold the total of each qrcode
        $datasetAllTotal = [];
        #all qrcodes for a vendor
        $vendorQrcodes = Qrcode::where(['platformId' => $platformId, 'status' => 'valid'])->get();

        foreach ($vendorQrcodes as $qr) {
            $obj = new stdClass();

            $obj->total = $this->getTotalTransactionQrcode($qr->id);
            $obj->name = $qr->brand_name;
            array_push($datasetAllTotal, $obj);
        }

        #get the total transaction of qrcodes that belong to a vendor
        $totalTransactionForVendor = array_sum(array_column($datasetAllTotal, 'total'));
        if($totalTransactionForVendor == 0)
            return "";

        foreach ($datasetAllTotal as $qrsum) {
            $objectqrcode = new stdClass();
            $objectqrcode->y = ($qrsum->total / $totalTransactionForVendor) * 100;
            $objectqrcode->label = $qrsum->name;
            array_push($dataset, $objectqrcode);
        }
        return $dataset;


    }

    public function getTotalTransactionQrcode($qrcode_id)
    {
        $total = Qrcode::find($qrcode_id)->transactions()->sum('amount');
        return $total;
    }


}
