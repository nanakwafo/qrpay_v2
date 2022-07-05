<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Amountsetting extends Model
{
    //
    protected $fillable = ['platformId','amount','qrcode_id'];
    public function  qrcode(){
        return $this->belongsTo(Qrcode::class);
    }

}
