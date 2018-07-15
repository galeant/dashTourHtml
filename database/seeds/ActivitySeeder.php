<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity')->insert([
        	['name' => 'Luxury'],
            ['name' => 'Leisure'],
            ['name' => 'Adventure'],
            ['name' => 'Beach'],
            ['name' => 'Mountain'],
            ['name' => 'Family'],
            ['name' => 'Historical Site'],
            ['name' => 'Action'],
            ['name' => 'Minimalis']
        ]);
    }
}
