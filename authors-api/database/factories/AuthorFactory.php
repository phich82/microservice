<?php

/*
|--------------------------------------------------------------------------
| Author Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'gender'  => $gender = $faker->randomElement(['Female', 'Male']),
        'name'    => $faker->name($gender),
        'country' => $faker->country(),
    ];
});
