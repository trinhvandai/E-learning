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

$factory->define(App\Models\CoursesUser::class, function (Faker $faker) {
    return [
        'uploaded_file_name' => $faker->name,
        'uploaded_file_description' => $faker->text,
        'uploaded_file_link' => $faker->image(
            $dir = config('view.image') . '/uploaded_file_link',
            $width = 640,
            $height = 480
        ),
        'course_id' => \App\Models\Course::all()->random()->id,
        'user_id' => \App\Models\User::all()->random()->id,
    ];
});
