<?php

namespace App\Http\Controllers;

use Activation;
use App\Models\User;


use Sentinel;


class ActivationController extends Controller
{
    //
    public function activate($email, $activationCode)
    {
        try {
            $credentials = [
                'login' => $email,
            ];
            $user = Sentinel::findByCredentials($credentials);
            if (Activation::complete($user, $activationCode)) {
                return redirect()->route('loginaccount');
            } else {
                if ($activation = Activation::completed($user))
                {
                    return redirect()->route('loginaccount');
                }
            }
        } catch (\Exception $exception) {
            return $exception;
        }


    }
}
