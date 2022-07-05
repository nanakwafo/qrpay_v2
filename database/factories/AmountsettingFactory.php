<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Amountsetting;
use Faker\Generator as Faker;

$factory->define(AmountSetting::class, function (Faker $faker) {
    return [
        //
        'amount'=>$faker->randomDigit,
        'platformId'=>'0878999',

    ];
});
