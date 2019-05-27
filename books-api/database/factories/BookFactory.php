<?php

/*
|--------------------------------------------------------------------------
| Book Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->sentence(3, true),
        'description' => $faker->sentence(6, true),
        'price'       => $faker->randomFloat(2, 25, 150),
        'author_id'   => $faker->numberBetween(1, 50),
    ];
});
