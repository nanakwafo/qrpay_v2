<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table ="transactions";
    protected $fillable =['paymentId','amount','payer_name','payer_email','payer_phone','accountId','qrcode_id','platformId'];

    public function  qrcode(){
       return $this->belongsTo(Qrcode::class);
    }

}
