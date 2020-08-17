<?php

use Illuminate\Database\Seeder;
use App\CategoriesRestaurants;

class CategoriesRestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoriesRestaurants::class, 14)->create();
    }
}
