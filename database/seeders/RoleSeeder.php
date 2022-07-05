<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert(array(
            array('slug'=>'vendor','name'=>'vendor'),
            array('slug'=>'manager','name'=>'manager'),
            array('slug'=>'visitor','name'=>'visitor'),

        ));
    }
}
