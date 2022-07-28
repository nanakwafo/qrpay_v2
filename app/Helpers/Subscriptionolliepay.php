<?php


namespace App\Helpers;


use App\Mutiqrcodesubsciption;

class Subscriptionolliepay
{

    public static function isAllowForMultiQrcode($platformId)
    {

        return  Mutiqrcodesubsciption::find($platformId)->pluck('status')->first();

    }
    public static function subscribeForMultipleQrCode($platformId){
        $multqrcode = Mutiqrcodesubsciption::find($platformId);

        $multqrcode->status = true;

        $multqrcode->save();

    }
    public static function unsubscribeForMultipleQrCode($platformId){
        $multqrcode = Mutiqrcodesubsciption::find($platformId);

        $multqrcode->status = false;

        $multqrcode->save();

    }
}
