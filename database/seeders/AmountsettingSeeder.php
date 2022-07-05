<?php

use App\Models\Amountsetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmountsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('amountsettings')->delete();
        factory(App\Amountsetting::class, 3)->create();
    }
}
