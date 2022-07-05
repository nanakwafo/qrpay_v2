<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    //

    protected $fillable =['platformId','logo','brand_name','status','url'];
    protected $guarded=['logo'];
    public  function transactions(){
        return  $this->hasMany(Transaction::class);
    }
    public function amounts(){
        return  $this->hasMany(Amountsetting::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

