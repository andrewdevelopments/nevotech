<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesRestaurants;
use Faker\Generator as Faker;

$factory->define(CategoriesRestaurants::class, function (Faker $faker) {
    return [
        'restaurants_id' => $faker->numberBetween(1, 8),
        'categories_id' => $faker->numberBetween(1, 14),
    ];
});
