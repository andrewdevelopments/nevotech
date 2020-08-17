<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_restaurants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('products_id')->references('id')->on('products');
            $table->foreignId('categories_id')->references('id')->on('categories');
            $table->foreignId('restaurants_id')->references('id')->on('restaurants');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_restaurants');
    }
}
