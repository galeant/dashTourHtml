<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
        	[
                'email' => 'admin@pigijo.com', 
                'fullName' => 'Aniiiii',
                'phone'    => '0000000000000',
                'password' => Hash::make('admin'),
                'token'    => str_random(50),
                'companyId'=> 1,
                'roleId'   => 1   
            ],
            [
                'email' => 'nana@pigijo.com', 
                'fullName' => 'Aniiiii',
                'phone'    => '0000000000000',
                'password' => Hash::make('admin'),
                'token'    => str_random(50),
                'companyId'=> 1,
                'roleId'   => 2   
            ],
            [
                'email' => 'nini@pigijo.com', 
                'fullName' => 'Aniiiii',
                'phone'    => '0000000000000',
                'password' => Hash::make('admin'),
                'token'    => str_random(50),
                'companyId'=> 1,
                'roleId'   => 2   
            ],
        ]);
    }
}
