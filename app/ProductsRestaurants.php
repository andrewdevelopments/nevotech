<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsRestaurants extends Model
{
    protected $table = 'products_restaurants';

    protected $fillable = [
        'products_id', 'restaurants_id', 'categories_id'
    ];

    public function restaurants() {
        return $this->belongsTo(Restaurants::class);
    }

    public function products() {
        return $this->belongsTo(Products::class);
    }

    public function categories() {
        return $this->belongsTo(CategoriesRestaurants::class);
    }

}
