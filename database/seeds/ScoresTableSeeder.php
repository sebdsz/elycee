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

        foreach(\App\User::where('role', '!=', 'teacher')->get() as $user) {
            App\Score::create([
                'user_id' => $user->id,
                'question_id' => 1,
                'note' => rand(0, 3),
            ]);
        }

    }
}
