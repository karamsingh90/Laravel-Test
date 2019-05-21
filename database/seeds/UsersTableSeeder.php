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
            'name' => 'karam',
            'email' => 'sony7596@gmail.com',
            'password' => bcrypt('lara-test'),
        ]);
    }
}
