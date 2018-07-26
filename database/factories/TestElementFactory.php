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
$factory->define(App\Models\TestElement::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'answer' => rand(1, 4),
        'test_id' => \App\Models\Test::all()->random()->id,
    ];
});
