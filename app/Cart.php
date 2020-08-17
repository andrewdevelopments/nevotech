<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'restaurants_id', 'categories_id', 'products_id', 'name', 'session', 'quantity', 'price'
    ];

}
