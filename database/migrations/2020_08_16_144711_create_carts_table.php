<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('restaurants_id')->references('id')->on('restaurants');
            $table->foreignId('categories_id')->references('id')->on('categories');
            $table->foreignId('products_id')->references('id')->on('products');

            $table->string('name');
            $table->string('session');
            $table->string('quantity');
            $table->decimal('price', 8, 2);

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
        Schema::dropIfExists('carts');
    }
}
