<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create(['property_name'=> 'FCM KEY','property_value'=>'fcm key here ....']);
        Setting::create(['property_name'=> 'STRIP PUBLIC','property_value'=>'strip public key asdc-dswe-abcd-abcd']);
        Setting::create(['property_name'=> 'STRIP SECURE','property_value'=>'strip secure key abcd-adef-sdwe-asdf']);

    }
}
