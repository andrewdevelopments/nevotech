<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use Faker\Generator as Faker;


$factory->define(Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Pizza',
            'Burger & Grill',
            'Vegetarian',
            'Paste',
            'Salate',
            'Garnituri',
            'Desert',
            'Bauturi',
            'Hot Menu',
            'Gratar',
            'Sosuri',
            'Meniuri',
            'Gustari',
            'Extra'
        ])
    ];
});


