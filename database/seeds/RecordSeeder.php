<?php

use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Question::create([
            'content' => 'La machine de turing c\'est quoi ?',
            'class_level' => 'first_class',
            'status' => 1,
        ]);

        App\Question::create([
            'content' => 'La vitesse d\'une réaction chimique',
            'class_level' => 'first_class',
            'status' => 1,
        ]);

        App\Question::create([
            'content' => 'Quelle affirmation est correcte ?',
            'class_level' => 'first_class',
            'status' => 1,
        ]);

        App\Question::create([
            'content' => 'La trempe',
            'class_level' => 'first_class',
            'status' => 1,
        ]);
    }
}
