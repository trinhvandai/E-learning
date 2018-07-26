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
$factory->define(App\Models\Test::class, function (Faker $faker) {
    return [
        'mark' => rand(1, 10),
        'courses_user_id' => \App\Models\CoursesUser::all()->random()->id,
    ];
});
