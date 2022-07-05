<?php

namespace App\Http\Controllers;

//use Activation;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

//use Sentinel;


class ActivationController extends Controller
{
    //
    public function activate($email, $activationCode)
    {
        try {
//            $credentials = [
//                'login' => $email,
//            ];
//            $user = Sentinel::findByCredentials($credentials);
//            $activation = Activation::complete($user, $activationCode);
//            if ($activation)
                return redirect()->route('loginaccount');

        } catch (\Exception $exception) {
            return $exception;
        }


    }
}
