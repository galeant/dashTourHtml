<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert([
            [
                'memberId' => 1,
                'emailAddress' => 'alpha@pigijo.com', 
                'fullName' => 'alpha',
                'phone'    => '08alpha',
                'gender'    => 'laki'
            ],
            [
                'memberId' => 2,
                'emailAddress' => 'beta@pigijo.com', 
                'fullName' => 'beta',
                'phone'    => '08beta',
                'gender'    => 'cewek'
            ]
        ]);
    }
}
