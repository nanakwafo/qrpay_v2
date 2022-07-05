<?php

namespace App\Http\Controllers;

use App\Amountsetting;
use App\Logqr;
use App\Qrcode;
use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class PaymentController extends Controller
{


    private $secretkey;
    private $publishablekey;

    public function __construct()
    {
        $this->secretkey = config('app.secret_key');
        $this->publishablekey = config('app.publishable_key');
    }

    public function createPayment(Request $request, $platformId = '', $qrcode_id = '')
    {


        if ($request->next_stage == 3) {

            if ($request->userAmount) {
                $userAccountId = DB::select('select accountId from accounts where platformId = :platformId limit 1', ['platformId' => $request->platformId])[0]->accountId;
                if (!empty($userAccountId)) {

                    $userAmount = $request->userAmount;
                    $charge = round((0.029 * $userAmount) + 0.30) ;
                    Stripe::setApiKey($this->secretkey);
                    $payment_intent = \Stripe\PaymentIntent::create([
                        'payment_method_types' => ['card'],
                        'amount' => $userAmount * 100, //1000
                        'currency' => 'nzd',
                        'application_fee_amount' => $charge * 100, //to be set in admin
                        'transfer_data' => [
                            'destination' => $userAccountId,
                        ],
                    ]);
                    $profileData = '';
                    return view('userpanel.receivepay', [
                        'client_secret' => $payment_intent->client_secret,
                        'profile' => $profileData,
                        'key' => $this->publishablekey,
                        'platformId' => $request->platformId,
                        'amount' => $userAmount,
                        'qrcode_id' => $request->qrcode_id,
                        'stage' => 3,

                    ]);
                } else {
                    abort(403);
                }
            }
        }
        elseif ($request->next_stage == 2) {

            return view('userpanel.receivepay', [
                'client_secret' => null,
                'stage' => 2,
                'platformId' => $request->platformId,
                'qrcode_id' => $request->qrcode_id,
                'amount' => Amountsetting::where(['platformId' => $request->platformId, 'qrcode_id' => $request->qrcode_id])->get(),

            ]);
        }
        else {
            $qrcode = Qrcode::where('id', $qrcode_id)->pluck('status')->first();
            if ($qrcode != 'valid') {
                abort(403);
            }

            Logqr::create(['qrcode_id' => $qrcode_id, 'platformId' => $platformId]);
            return view('userpanel.receivepay', [
                'client_secret' => null,
                'stage' => 1,
                'platformId' => $platformId,
                'qrcode_id' => $qrcode_id,
                'amount' => Amountsetting::where(['platformId' => $platformId, 'qrcode_id' => $qrcode_id])->get(),

            ]);
        }


    }


    public function success($amount='',$companyname=''){
        return view('userpanel.paymentsuccess', [
            'amount' => $amount,
            'companyname' => $companyname,

        ]);
    }
}
