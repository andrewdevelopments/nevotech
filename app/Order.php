<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'shipping_firstname', 'shipping_lastname', 'shipping_email', 'shipping_telephone', 'shipping_city', 'shipping_state', 'shipping_zipcode', 'shipping_address', 'user_session', 'order_total', 'order_status'
    ];

    public function products() {
        return $this->belongsToMany(Products::class, 'orders_products', 'orders_id');
    }

}
