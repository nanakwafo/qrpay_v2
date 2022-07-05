<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\LoginRequest;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{


    ///////////////////////////////////////////////////////////////
    /////////////////load login view///////////////////////////////
    /// ///////////////////////////////////////////////////////////
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){


        return view('frontend.signin');
    }

    ////////////////////////////////////////////////////////////////
    ///////////////// user tries to login///////////////////////////
    /// ///////////////////////////////////////////////////////////

    public function handleAccountLogin(LoginRequest $request){
        /***********validate request from login form**********/
        $validated = $request->validated();
        try{
            $credentials = [
                'email'    => trim($validated['email']),
                'password' => trim($validated['password']),
            ];
            if(Sentinel::authenticate($credentials)){
                if(Sentinel::getUser()->roles()->first()->slug =='vendor') {
                    $platformId = Account::where('email', $validated['email'])->pluck('platformId')->first();
                    dd($platformId);
                    //return redirect('dashboard/' . $platformId);
                }
            }else
            {
                return redirect()->back()->with(['error'=>'Wrong Email or Password']);
            }
        }catch(ThrottlingException $e){
            $delay=$e->getDelay();
            return redirect()->back()->with(['error'=>"You are banned for $delay seconds."]);

        }catch (NotActivatedException $e){
            return redirect()->back()->with(['error'=>"Your account has not been activated"]);
        }
    }
    ////////////////////////////////////////////////////////////////
    ///////////////// log out a user/////////////////////////////////
    /// ////////////////////////////////////////////////////////////
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(){
        Sentinel::logout();
        return redirect('loginaccount');
    }
}
