<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'average_rate' => rand(1, 5),
        'parent_id' => rand(1, 10),
        'topic_id' => \App\Models\Topic::all()->random()->id,
        'user_id' => \App\Models\User::all()->random()->id,
    ];
});
