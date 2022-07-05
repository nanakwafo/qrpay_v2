<?php

namespace App\Http\Controllers;


use App\Helpers\Stripeuser;
use App\Http\Requests\Processemailregistration;
use App\Qrcode;
use Illuminate\Http\Request;
use Stripe\Account;
use Stripe\AccountLink;
use Stripe\Stripe;
use Sentinel;

class AccountController extends Controller
{

    private $apiKey;
    private $return_url;
    private $refresh_url;


    public function __construct()
    {
        $this->apiKey = config('app.secret_key');
        $this->return_url =config('app.return_url');
        $this->refresh_url =config('app.refresh_url');
    }


    public function index()
    {
        return view('frontend.register', []);
    }
    protected function createAccountStripe($email)
    {
        Stripe::setApiKey($this->apiKey);
        $account = Account::create([
            'country' => 'NZ',//default
            'type' => 'express',
            'email' => $email,
            'requested_capabilities' => ['card_payments', 'transfers'],
        ]);
        return $account;
    }


    public function createAccountLink($account)
    {
        Stripe::setApiKey($this->apiKey);
        $account_links = AccountLink::create([
            'account' => $account->id,
            'refresh_url' => $this->refresh_url .'/'.$account->email,
            'return_url' => $this->return_url,
            'type' => 'account_onboarding',
            'collect' => 'eventually_due',
        ]);
        return $account_links;
    }

    public function handleAccountCreation($email)
    {
         $details = $this->createAccountLink($this->createAccountStripe($email));
         return redirect($details->url);

    }

    public function accountReturn()
    {
            return redirect()->route('loginaccount')->with('success','You have successfully registered your payment details with Stripe.Sign back in to generate your first QR code.');
    }
    public function striperefresh($email){
        $details = $this->createAccountLink($this->createAccountStripe($email));

        return redirect($details->url);
    }


    public function registereduser(Request $request)
    {
        //todo  only update when charges_enabled ==true
        if ($request->type == 'account.updated') {

            \App\Account::where('email', trim($request->data['object']['email']))
                ->update(['accountId' => trim($request->data['object']['id'])]);
        }
    }


}
