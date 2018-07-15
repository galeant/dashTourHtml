<?php

use Illuminate\Database\Seeder;

class ItinerarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itinerary')->insert([
        	['day' => '1','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '1','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '1','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '1','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '2','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '2','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '2','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '2','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '2','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '3','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],

            ['day' => '3','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '3','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '3','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '3','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '4','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '4','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '4','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '4','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],

            ['day' => '4','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '5','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1],
            ['day' => '5','startTime' => '10:00:00','endTime' => '10:00:00','description' => 'jalan','productId' => 1]
        ]);
    }
}
