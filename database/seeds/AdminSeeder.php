<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'email' => 'admin@admin.com',
            'password' => md5('admin'),
            'token' => str_random(50)
        ]);
    }
}
