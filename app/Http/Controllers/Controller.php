<?php

namespace App\Http\Controllers;

use App\Helpers\Stripeuser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    #show user onboard status
    protected function userOnboardStatus($platformId){
      return  Stripeuser::isUserFinishedOnbboardingProcess($platformId);
    }
    protected function profileDetails($platformId){
      return  Stripeuser::getProfileDetails($platformId);
    }

}
