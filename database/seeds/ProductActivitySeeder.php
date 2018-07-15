<?php

use Illuminate\Database\Seeder;

class ProductActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_activity')->insert([
        	['productId' => 1,'activityId' => 1],
        	['productId' => 1,'activityId' => 2],
        	['productId' => 1,'activityId' => 3]
        ]);
    }
}
