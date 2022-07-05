<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutiqrcodesubsciption extends Model
{
    //
    protected $primaryKey = 'platformId';
    protected $fillable = ['platformId','status','subscriptioncat_id'];

    public function subscriptioncat()
    {
        return $this->belongsTo(Subscriptioncat::class);
    }
}
