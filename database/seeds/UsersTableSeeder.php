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
        DB::table('users')->insert([
        	'name' => 'MR JAHID',
        	'email' => 'mrjahid350@gmail.com',
        	'password' => bcrypt('0981235500'),
        ]);
    }
}
