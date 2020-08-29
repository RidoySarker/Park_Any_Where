<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        // 	'name' => 'MR JAHID',
        // 	'email' => 'mrjahid350@gmail.com',
        // 	'password' => bcrypt('0981235500'),
        // 	'email_verified' => 1,
        // 	'email_verified_at' => \Carbon\Carbon::now(),
        // 	'email_verification_token' => '',
        // ]);
        DB::table('users')->insert([
        	'name' => 'Ridoy',
            'email' => 'csridoy42@gmail.com',
        	'number' => '01883448329',
            'password' => '$2y$10$hBFJI27uy07NInxmLna8cu16sCWcpNuU6h358tzseNjSZoMISQBLS',
            'email_verified' => 1,
            'email_verified_at' => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
    }
}
