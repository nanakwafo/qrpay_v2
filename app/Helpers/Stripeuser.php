<?php


namespace App\Helpers;


use App\Models\Logqr;
use App\Models\Profile;
use App\Models\Qrcode;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class Stripeuser
{

    public static function getBalance($platformId)
    {
        $accountId = self::getaccountId($platformId);
        Stripe::setApiKey(config('app.secret_key'));
        $balance = \Stripe\Balance::retrieve(
            ['stripe_account' => $accountId]
        );
        return $balance->pending[0]->amount / 100 ;
    }

    public static function getAvialableBalance($platformId)
    {
        $accountId = self::getaccountId($platformId);
        Stripe::setApiKey(config('app.secret_key'));
        $balance = \Stripe\Balance::retrieve(
            ['stripe_account' => $accountId]
        );
        return $balance->available[0]->amount / 100 ;
    }

    public static function getaccountId($platformId)
    {
        try{
            $userAccountId = DB::select('select accountId from accounts where platformId = :platformId limit 1', ['platformId' => $platformId])[0]->accountId;
            return $userAccountId;
        }catch (\Exception $exception){
             abort(404);
        }

    }

    public static function getBrandLogo($platformId)
    {

        $query = DB::select('select logo from profiles where platformId = :platformId limit 1', ['platformId' => $platformId]);

        if(empty($query)){
            return '';
        }
        return $query[0]->logo;
    }

    public static function getBrandName($platformId)
    {
        $query = DB::select('select companyname from profiles where platformId = :platformId limit 1', ['platformId' => $platformId]);

        if(empty($query)){
            return '';
        }
        return $query[0]->companyname;
    }

    public static function getUserAccountEmail($platformId)
    {
        $userAccountId = DB::select('select email from accounts where platformId = :platformId limit 1', ['platformId' => $platformId])[0]->email;
        return $userAccountId;
    }

    public static function isUserFinishedOnbboardingProcess($platformId)
    {
        $accountId = self::getaccountId($platformId);
        if($accountId == ''){
            return false;
        }
        $stripe = new \Stripe\StripeClient(config('app.secret_key'));
        $stripeUser = $stripe->accounts->retrieve($accountId);
        return $stripeUser->charges_enabled;

    }
    public static function getProfileDetails($platformId){
       return Profile::where('platformId', $platformId)->first();
    }

    public static  function getTotalCollectedForQrCode($platformId,$qrcodeId){
      $total = DB::table('transactions')->where('qrcode_id',$qrcodeId)->where('platformId',$platformId) ->sum('amount');
      return $total;
    }
    public static function getTotalViewsForQrCode($platformId,$qrcodeId){
      return  Logqr::where(['platformId'=>$platformId,'qrcode_id'=>$qrcodeId])->count();

    }
    public static function getOverallDanations($platformId){

        return Transaction::where('platformId',$platformId)->sum('amount');

    }



}
