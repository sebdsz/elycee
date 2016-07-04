<?php

use Illuminate\Database\Seeder;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Choice::create([
            'question_id' => 1,
            'content' => "C'est une machine à laver",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 1,
            'content' => "C'est une machine qui sert à voyager dans le temps ?",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 1,
            'content' => "C'est un modèle abstrait du fonctionnement des appareils mécaniques de calcul",
            'status' => 1,
        ]);
    }
}
