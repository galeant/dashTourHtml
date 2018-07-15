<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
                ['languageId' => 1,'languageCode' => 'EN','languageName' => 'England'],
                ['languageId' => 2,'languageCode' => 'ID','languageName' => 'Indonesia'],
            ]
        );
    }
}
