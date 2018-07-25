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
$factory->define(App\Models\Specialize::class, function (Faker $faker) {
    return [
        'name' => $faker->creditCardType,
        'teaching_grade' => rand(1, 12),
        'deleted_at' => null,
    ];
});
