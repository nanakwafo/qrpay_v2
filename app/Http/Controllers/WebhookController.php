<?php

namespace App\Http\Controllers;


use App\Mail\DonorRecept;
use App\Mail\VendorDonationMail;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sentinel;

class WebhookController extends Controller
{

    public function paymentdone(Request $request)
    {

//        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
//
//        $endpoint_secret = 'whsec_...';
//
//        $payload = @file_get_contents('php://input');
//        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
//        $event = null;
//
//        try {
//            $event = \Stripe\Webhook::constructEvent(
//                $payload, $sig_header, $endpoint_secret
//            );
//        } catch(\UnexpectedValueException $e) {
//            // Invalid payload
//            http_response_code(400);
//            exit();
//        } catch(\Stripe\Exception\SignatureVerificationException $e) {
//            // Invalid signature
//            http_response_code(400);
//            exit();
//        }
//        switch ($event->type) {
//            case 'payment_intent.succeeded':
//                $paymentReceived = \App\Transaction::create([
//                    'paymentId' =>$request->data['object']['id'], //from stripe
//                    'amount' => $request->data['object']['amount'], //from stripe
//                    'payer_name' => $request->data['object']['charges']['data'][0]['billing_details']['name'] ,//from stripe
//                    'payer_phone' => $request->data['object']['charges']['data'][0]['billing_details']['phone'] ,//from stripe
//                    'accountId' => $request->data['object']['charges']['data'][0]['destination'],//from stripe
//
//                ]);
//            default:
//                echo 'Received unknown event type ' . $event->type;
//        }


        if ($request->type == 'payment_intent.succeeded') {
            $donorEmail = trim($request->data['object']['charges']['data'][0]['billing_details']['email']);
            $qrcode_id = explode("|", $request->data['object']['charges']['data'][0]['billing_details']['name'])[1];
            $amount =$request->data['object']['amount'] / 100;
            Transaction::create([
                'paymentId' => $request->data['object']['id'], //from stripe
                'amount' => $amount, //from stripe
                'payer_email' => $request->data['object']['charges']['data'][0]['billing_details']['email'],
                'payer_name' => explode("|", $request->data['object']['charges']['data'][0]['billing_details']['name'])[0],//from stripe
                'payer_phone' => $request->data['object']['charges']['data'][0]['billing_details']['phone'],//from stripe
                'accountId' => $request->data['object']['charges']['data'][0]['destination'],//from stripe
                'qrcode_id' => explode("|", $request->data['object']['charges']['data'][0]['billing_details']['name'])[1],
                'platformId' => explode("|", $request->data['object']['charges']['data'][0]['billing_details']['name'])[2],
            ]);

            #send mail to donor
            if (isset($donorEmail))
                 Mail::to($donorEmail)->send(new  DonorRecept($qrcode_id,$amount,$request->data['object']['id']));
//Mail::to($donorEmail)->send(new  DonorRecept($qrcode_id,$amount));

            #send mail to vendor
//            $vendorEmail = User::find(Qrcode::find($qrcode_id)->user_id)->email;
//            if (isset($vendorEmail))
//                Mail::to($vendorEmail)->send(new  VendorDonationMail());


        }
    }
}
