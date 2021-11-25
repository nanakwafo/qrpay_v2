<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index(Request $request, $platformId = '', $email = '')
    {
        //todo:check if user has a valid platform id
        if ($platformId == '') {
            //todo check if cookie is not null
            $email = $_COOKIE['registeringUser'];
            //  $email ='nanamensah1150@gmail.com'; //for test
            //todo check id cooie is null redirect to registrattion page
            return view('userpanel.password', ['show' => '0', 'email' => $email]);
        }
        return view('userpanel.password', ['show' => '1', 'email' => $email, 'platformId' => $platformId]);

    }
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

    public function confirmemail(Request $request)
    {

        $registeringUser = Account::where('email', $request->email)->first();
        if(!$registeringUser){
            //error did not find email address
            Session::flash('error','Email Address not found.Something Went wrong.Please contact administrator');

            return redirect('accountpassword');
        }
        $platformId = Account::where('email', $request->email)->pluck('platformId')->first();

        if ($platformId) {
            return redirect('accountpassword/' . $platformId. '/' . $request->email);
        }

    }

    ///////////////////////////////////////////////////
    ///// Send email activationmail////////////////////
    ///////////////////////////////////////////////////
    public function sendActivationMail($email,$code){
        Mail::to($email)->send(new ActivationMail($code,$email));
    }
}
