<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 32; $i++) {
            App\Score::create([
                'user_id' => $i,
                'question_id' => 1,
                'note' => rand(0, 3),
            ]);
        }

    }
}
