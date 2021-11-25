<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    //
    //////////////////////////////////////////////
    ////////////Handle registration //////////////
    /// //////////////////////////////////////////
    public function update(Request $request)
    {
// to be uncommented to live
//        $this->validate($request,[
//            'fname'=>'required',
//            'email'=>'unique:users|required|email',
//            'password'=>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
//        ]);
//
//        /*************register user**************/
//        $credentials = [
//            'email'    => $request->email,
//            'password' => $request->password,
//            'first_name'=> $request->fname,
//        ];
//
//        //user need to activate account as a way to verifiy email
//        $user = Sentinel::register($credentials);
//
//        $activation = Activation::create($user);
//
//        $role = Sentinel::findRoleBySlug('vendor');
//
//        $role->users()->attach($user);
//        Account::create([
//            'email'=>$request->email,
//            'platformId' => md5($request->password), //from stripe
//            'accountId'=> ''
//        ]);
//
//        /*************register user**************/
//
//        /*************Send Acytivation MAil**********/
//        $this->sendActivationMail($request->email,$activation->code);

//        return redirect()->back()->with(['success'=>'An activation link was sent to your email Address']);
        return redirect()->back()->with(['success'=>'Please contact me on nanamensah1150@gmail.com if its in your interest to use qrcodepay in the future.']);

    }
}
