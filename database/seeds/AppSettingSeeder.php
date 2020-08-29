<?php

use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_settings')->insert([
        	'application_logo' => 'images/app_setting/app_1598468332.png',
        	'application_name' => 'Park Any Where',
        	'application_email' => 'csridoy42@gmail.com',
        	'application_phone' => '01883448329',
        	'application_address' => 'Mirpur,Dhaka',
        	'about' => 'Parking Syatem',
        	'vat' => 10,
        ]);
    }
}
