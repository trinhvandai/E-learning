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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make($faker->password),
        'phone' => $faker->e164PhoneNumber,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->address,
        'avatar' => $faker->image(
            $dir = config('view.image') . '/avatar',
            $width = 640,
            $height = 480
        ),
        'working_place' => $faker->company,
        'grade' => rand(1, 12),
        'role' => rand(0, 2),
        'remember_token' => str_random(10),
    ];
});
