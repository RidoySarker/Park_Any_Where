<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
        	'payment_method_name' => 'bKash',
        	'payment_method_description' => 'Dhaka Area',
        	'payment_method_status' => 1,
        ]);

        DB::table('payment_methods')->insert([
        	'payment_method_name' => 'Rocket',
        	'payment_method_description' => 'Comilla Area',
        	'payment_method_status' => 1,
        ]);
    }
}
