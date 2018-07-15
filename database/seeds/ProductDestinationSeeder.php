<?php

use Illuminate\Database\Seeder;

class ProductDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_destination')->insert([
        	['productId' => 1,'destinationId' => 1],
        	['productId' => 2,'destinationId' => 2],
        	['productId' => 2,'destinationId' => 3]
        ]);
    }
}
