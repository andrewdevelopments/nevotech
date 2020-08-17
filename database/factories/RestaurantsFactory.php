<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurants;
use Faker\Generator as Faker;

$factory->define(Restaurants::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Trattoria Al Forno',
            'Burger & Grill House',
            'Di\'Vino Pizza',
            'Basilico',
            'Dominium Bar & Grill',
            'Jad Sticks',
            'IUTE',
            'Magic bistro'
        ]),
        'address' => $faker->unique()->randomElement([
            'Strada Prelungire Ghencea 262, 061702 Bucharest',
            'Prelungirea Ghencea 47-49, 061701 Bucharest',
            'Prelungirea Ghencea, nr. 83C, 061702 Bucharest',
            'Strada Iordache Nastase 31, 050378 Bucharest',
            'Strada Radu Beller 6-8, 011703 Bucharest',
            'Bulevardul Iuliu Maniu 304, 061127 Bucharest',
            'Bulevardul Iuliu Maniu 500, 061087 Bucharest',
            'Strada Condorului, nr.3, 52753 Bucharest'
        ]),
        'status' => $faker->randomElement([0, 1, 1, 1]),
        'image' => $faker->image('public/images/restaurant/',800,600, 'food', false),
        'minimum_order' => $faker->randomFloat(null, 0, 100),
    ];
});
