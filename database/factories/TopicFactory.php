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

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'topic_image' => $faker->image(
            $dir = config('view.image') . '/topic_image',
            $width = 640,
            $height = 480
        ),
        'forum_id' => \App\Models\Forum::all()->random()->id,
        'category_id' => \App\Models\Category::all()->random()->id,
    ];
});
