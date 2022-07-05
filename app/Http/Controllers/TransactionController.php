<?php

namespace App\Http\Controllers;

use App\Helpers\Stripeuser;
use App\Transaction;
use Sentinel;

class TransactionController extends Controller
{
    //
    public function index($platformId){


         $accountId = Stripeuser::getaccountId($platformId);

          $transaction =  Transaction::where('accountId',$accountId)->get();


        return view('userpanel.transaction',[
            'data'=>$transaction,
            'platformId'=>$platformId,
            'details' => $this->profileDetails($platformId),
            'userOnboardStatus'=>$this->userOnboardStatus($platformId)
        ]);
    }
}
