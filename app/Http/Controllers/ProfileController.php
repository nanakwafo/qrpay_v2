<?php

namespace App\Http\Controllers;

use App\Helpers\Stripeuser;
use App\Profile;
use Sentinel;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{

    public function index($platformId)
    {


        if (empty($this->profileDetails($platformId))) {

            toastr()->warning('Please update your profile details');
            return view('userpanel.profile',
                [
                    'platformId' => $platformId,
                    'details' => $this->profileDetails($platformId),
                    'userOnboardStatus' => $this->userOnboardStatus($platformId)
                ]);
        }
        return view('userpanel.profile',
            [
                'platformId' => $platformId,
                'details' => $this->profileDetails($platformId),
                'userOnboardStatus' => $this->userOnboardStatus($platformId)
            ]);
    }


    public function updateprofile(Request $request)
    {

        # chck if data exist in row one
        $profile = Profile::where('platformId', $request->platformId)->first();

        if (!empty($profile)) {

            if ($request->hasFile('logo')) {

                $logo = $request->file('logo');
                $filename = time() . '.' . $logo->getClientOriginalExtension();

                $profile = Profile::findorfail($profile->id);
                $profile->companyname = $request->companyname;
                $profile->phone = $request->phone;
                $profile->email = $request->email;
                $profile->address = $request->address;
//                $profile->mobile = $request->mobile;
//                $profile->website = $request->website;
//                $profile->fax = $request->fax;
                $profile->logo = $filename;
                $profile->update();
                Image::make($logo)->resize(300, 300)->save(public_path('/uploads/' . $filename));
                toastr()->success('Profile has been updated successfully');
                return redirect('/profile/' . $request->platformId);


            } else {
                $profile = Profile::findorfail($profile->id);
                $profile->companyname = $request->companyname;
                $profile->phone = $request->phone;
                $profile->email = $request->email;
                $profile->address = $request->address;
//                $profile->mobile = $request->mobile;
//                $profile->website = $request->website;
//                $profile->fax = $request->fax;
                $profile->update();
                toastr()->success('Profile has been updated successfully');
                return redirect('/profile/' . $request->platformId);
            }

        } else {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $filename = time() . '.' . $logo->getClientOriginalExtension();

                $profile = new Profile();
                $profile->companyname = $request->companyname;
                $profile->phone = $request->phone;
                $profile->email = $request->email;
                $profile->address = $request->address;
//                $profile->mobile = $request->mobile;
//                $profile->website = $request->website;
//                $profile->fax = $request->fax;
                $profile->logo = $filename;
                $profile->platformId = $request->platformId;
                $profile->save();
                Image::make($logo)->resize(300, 300)->save(public_path('/uploads/' . $filename));
                toastr()->success('Profile has been updated successfully');
                return redirect('/profile/' . $request->platformId);
            } else {
                $profile = new Profile();
                $profile->companyname = $request->companyname;
                $profile->phone = $request->phone;
                $profile->email = $request->email;
                $profile->address = $request->address;
//                $profile->mobile = $request->mobile;
//                $profile->website = $request->website;
//                $profile->fax = $request->fax;
                $profile->platformId = $request->platformId;
                $profile->save();
                toastr()->success('Profile has been updated successfully');
                return redirect('/profile/' . $request->platformId);
            }
        }


    }

}
