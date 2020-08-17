<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    protected $table = 'orders_products';

    protected $fillable = [
        'orders_id', 'products_id', 'quantity', 'price', 'user_session', 'name'
    ];

}
