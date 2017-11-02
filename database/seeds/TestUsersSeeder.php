<?php

use Illuminate\Database\Seeder;

use App\User;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Strift',
            'email' => 'strift@veachronicles.com',
            'password' => bcrypt('secret')
            ]);
    }
}
