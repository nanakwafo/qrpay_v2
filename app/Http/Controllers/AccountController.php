<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $apiKey;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $return_url;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $refresh_url;


    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->apiKey = config('app.secret_key');
        $this->return_url = config('app.return_url');
        $this->refresh_url = config('app.refresh_url');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.signup');
    }

    /**
     * @param $email
     * @return mixed
     */
    public function createAccountStripe($email)
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


    /**
     * @param $account
     * @return mixed
     */
    public function createAccountLink($account)
    {
        Stripe::setApiKey($this->apiKey);
        $account_links = AccountLink::create([
            'account' => $account->id,
            'refresh_url' => $this->refresh_url . '/' . $account->email,
            'return_url' => $this->return_url,
            'type' => 'account_onboarding',
            'collect' => 'eventually_due',
        ]);
        return $account_links;
    }

    /**
     * @param $email
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleAccountCreation($email)
    {
        $details = $this->createAccountLink($this->createAccountStripe($email));
        return redirect($details->url);

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accountReturn()
    {
        return redirect()->route('loginaccount')->with('success', 'You have successfully registered your payment details with Stripe.Sign back in to generate your first QR code.');
    }

    /**
     * @param $email
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function striperefresh($email)
    {
        $details = $this->createAccountLink($this->createAccountStripe($email));

        return redirect($details->url);
    }


    /**
     * @param Request $request
     */
    public function registereduser(Request $request)
    {
        //todo  only update when charges_enabled ==true
        if ($request->type == 'account.updated') {

            \App\Account::where('email', trim($request->data['object']['email']))
                ->update(['accountId' => trim($request->data['object']['id'])]);
        }
    }
}
