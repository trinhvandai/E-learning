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

$factory->define(App\Models\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'course_avatar' => $faker->image(
            $dir = config('view.image') . '/course_avatar',
            $width = 640,
            $height = 480
        ),
        'course_avatar_2' => $faker->image(
            $dir = config('view.image') . '/course_avatar',
            $width = 640,
            $height = 480
        ),
        'course_avatar_3' => $faker->image(
            $dir = config('view.image') . '/course_avatar',
            $width = 640,
            $height = 480
        ),
        'slide_image' => $faker->image(
            $dir = config('view.image') . '/slide_image',
            $width = 64,
            $height = 48
        ),
        'description' => $faker->text,
        'like' => rand(1, 1000),
        'lecture_count' => rand(1, 40),
        'time' => rand(1, 40),
        'level' => rand(1, 5),
        'view' => rand(1, 1000),
        'course_rate' => rand(1, 5),
        'category_id' => \App\Models\Category::all()->random()->id,
    ];
});
