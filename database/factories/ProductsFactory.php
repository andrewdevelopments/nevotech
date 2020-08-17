<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        //'restaurants_id' => $faker->numberBetween(1, 8),
        //'categories_id' => $faker->numberBetween(1, 14),

        'name' => $faker->randomElement([
            'Pizza All cheese',
            'Pizza Argentina',
            'Pizza Carnivor',
            'Pizza Ocean',
            'Pizza Pastrami',
            'Paste Bolognese',
            'Paste Carbonara',
            'Paste Quattro formaggi',
            'Paste Verdurette',
            'Cartofi wedges',
            'Inele de ceapA',
            'Focaccia cu usturoi',
            'Salata coleslaw',
            'Salată Caesar',
            'Salată Mediteraneana',
            'Salată Ton',
            'Sos Garden',
            'Sos Salsa',
            'Sos pizza dulce',
            'Sos pizza iute',
            'Sos honey moustard',
            'Dublu Cheeseburger',
            'Happy Burger',
            'Haloumi Burger',
            'Chicken Burger',
            'Special Burger',
            'Bacon Burger',
            'Pepsi Cola - 330ml',
            '7UP - 330ml',
            'Mirinda - 330ml',
        ]),
        'product_code' => $faker->ean8,
        'description' => $faker->text(200),
        'price' => $faker->randomFloat(null, 0, 100),
        'image' => $faker->image('public/images/food/',800,600, 'food', false),
    ];
});
