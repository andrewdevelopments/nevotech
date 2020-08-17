<?php
use Illuminate\Database\Seeder;
use App\Restaurants;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurants::class, 8)->create();

    }
}
