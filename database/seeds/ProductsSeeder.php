<?php

use Illuminate\Database\Seeder;
use App\Products;
use App\User;
use App\ProductsRestaurants;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Products::class, 60)->create();
        factory(ProductsRestaurants::class, 60)->create();

        App\User::create([
            'name' => 'Matei Popescu',
            'email' => 'manager@shifter.io',
            'role' => 'Manager',
            'email_verified_at' => now(),
            'password' => bcrypt('manager'),
            'remember_token' => Str::random(10),
        ]);

        App\User::create([
            'name' => 'Ionescu Iulian',
            'email' => 'livrator@shifter.io',
            'role' => 'Livrator',
            'email_verified_at' => now(),
            'password' => bcrypt('livrator'),
            'remember_token' => Str::random(10),
        ]);

    }
}
