<?php

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
        	'vehicle_type' => 'Bike',
        	'vehicle_charge' => 5,
        	'vehicle_time' => 1,
        	'vehicle_period' => 'minute',
        	'vehicle_status' => 1,
        ]);

        DB::table('vehicles')->insert([
        	'vehicle_type' => 'Car',
        	'vehicle_charge' => 15,
        	'vehicle_time' => 1,
        	'vehicle_period' => 'hour',
        	'vehicle_status' => 1,
        ]);
    }
}
