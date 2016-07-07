<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {
    $role = ['first_class', 'final_class'];
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'role' => $role[rand(0,1)],
        'password' => \Illuminate\Support\Facades\Hash::make($faker->password()),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3),
        'user_id' => 1,
        'content' => $faker->sentences(10, true),
        'date' => $faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
        'status' => rand(0,1),
    ];
});
