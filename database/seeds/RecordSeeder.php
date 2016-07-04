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
            'title' => 'Machine de turing',
            'content' => 'La machine de turing c\'est quoi ?',
            'class_level' => 'first_class',
            'status' => 1,
        ]);
    }
}
