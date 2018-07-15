<?php

use Illuminate\Database\Seeder;

class TipsQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tips_questions')->insert([
            ['tipsQuestion' => 'How to get there?'],
            ['tipsQuestion' => 'Entrance fee?'],
        ]
    );
    }
}
