<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesRestaurants extends Model
{

    protected $table = 'categories_restaurants';

    protected $fillable = [
        'restaurants_id', 'categories_id'
    ];
}
