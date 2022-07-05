<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriptioncat extends Model
{
    //
    protected $fillable = ['name'];


    public function multiqrcodesubscription()
    {
        return $this->hasMany(Mutiqrcodesubsciption::class);
    }
}
