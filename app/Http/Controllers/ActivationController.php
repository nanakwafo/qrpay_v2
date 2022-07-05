<?php

namespace App\Http\Controllers;

use Activation;
use App\User;
use Sentinel;


class ActivationController extends Controller
{
    //
    public function activate($email, $activationCode){
        $user = User::whereEmail($email)->first();

        if(Activation::complete($user,$activationCode))
        {
            return redirect('/loginaccount');

        }else{

        }
    }
}
