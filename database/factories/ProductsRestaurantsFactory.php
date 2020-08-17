<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductsRestaurants;
use Faker\Generator as Faker;

$factory->define(ProductsRestaurants::class, function (Faker $faker) {
    return [
        'restaurants_id' => $faker->numberBetween(1, 8),
        'categories_id' => $faker->randomElement([1, 2, 3, 4]),
        'products_id' => $faker->numberBetween(1, 60),
    ];
});
