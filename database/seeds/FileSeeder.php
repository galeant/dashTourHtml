<?php

use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_destination')->insert([
        	['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2]
        ]);
        DB::table('image_activity')->insert([
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2]
        ]);
        DB::table('image_accommodation')->insert([
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2]
        ]);
        DB::table('video_url')->insert([
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 1],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2],
            ['url' => 'path_to_image','productId' => 2]
        ]);
    }
}
