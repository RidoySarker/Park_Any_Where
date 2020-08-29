<?php

use Illuminate\Database\Seeder;

class ZoneLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location_zones')->insert([
        	'location_zone_name' => 'Dhaka',
        	'location_zone_description' => 'Dhaka Area',
        	'location_zone_status' => 1,
        ]);

        DB::table('location_zones')->insert([
        	'location_zone_name' => 'Comilla',
        	'location_zone_description' => 'Comilla Area',
        	'location_zone_status' => 1,
        ]);
    }
}
