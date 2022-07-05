<?php

namespace App\Http\Controllers;


use App\Mail\ForgotPasswordMail;
use App\User;
//use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Reminder;
use Illuminate\Http\Request;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller
{
    //
    public function index()
    {
        return view('userpanel.forgotpassword');
    }

    public function postForgotPassword(Request $request)
    {

        $user = User::whereEmail($request->email)->first();
        if ($user== null){
            return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
        }
        $reminder = Reminder::exists($user) ? : Reminder:: create($user);
        if( !is_bool($reminder) ){
           $this->sendEmail($user,$reminder->code);
           return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
       }else{
           return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
       }




    }

    public function resetpassword($email, $resetCode)
    {
        $user = User::byEmail($email);

        if ($user == null){
            abort(404);
        }

        if ($reminder = Reminder::exists($user)) {

                return view('userpanel.resetpassword');

        } else {
            return redirect('/');
        }

    }
    public function postresetpassword(Request $request,$email, $resetCode){
        $this->validate($request,[
            'password'=>'confirmed|required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password_confirmation'=>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]);
        $user = User::byEmail($email);

        if ($user == null)
            abort(404);

        if ($reminder = Reminder::exists($user)) {

                Reminder::complete($user,$resetCode,$request->password);
                return  redirect('loginaccount')->with('success','Please login with your new password');

        } else {
            return redirect('/');
        }
    }

    public function sendEmail($user, $code)
    {

        Mail::to(trim($user->email))->send(new ForgotPasswordMail($code, $user->email));
    }
}
