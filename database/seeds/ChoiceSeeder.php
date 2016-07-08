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

        App\Choice::create([
            'question_id' => 2,
            'content' => "Augmente avec la concentration des réactifs",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 2,
            'content' => "Augmente avec la concentration des produits",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 2,
            'content' => "Est indépendante de la concentration des réactifs",
            'status' => 1,
        ]);

        App\Choice::create([
            'question_id' => 3,
            'content' => "La vitesse d'une réaction augmente généralement avec la température",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 3,
            'content' => "La vitesse d'une réaction diminue quand la température augmente",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 3,
            'content' => "La vitesse d'une réaction est indépendante de la concentration des réactifs",
            'status' => 1,
        ]);

        App\Choice::create([
            'question_id' => 4,
            'content' => "Consiste à rajouter de l'eau au milieu réactionnel",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 4,
            'content' => "Consiste à vaporiser le milieu réactionnel",
            'status' => 0,
        ]);

        App\Choice::create([
            'question_id' => 4,
            'content' => "Désigne le refroidissement brutal du milieu réactionnel",
            'status' => 1,
        ]);
    }
}
