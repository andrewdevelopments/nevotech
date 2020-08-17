<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{

    protected $table = 'restaurants';

    protected $fillable = [
        'image', 'name', 'address', 'minimum_order'
    ];

    public function category() {
        return $this->belongsToMany(Categories::class);
    }

    public function products() {
        return $this->belongsToMany(Products::class);
    }

}
