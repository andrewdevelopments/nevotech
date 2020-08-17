<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCart() {

        $total = Cart::where('session', session()->getId())->sum('price');
        $products = Cart::where('session', session()->getId())->groupBy('products_id')->distinct()->get();

        $cartItems = array();
        foreach( $products as $product ) {

            $cartItems[] = array(
                'checkout_id' => $product->id,
                'id' => $product->products_id,
                'name' => $product->name,
                'price' => $product->price,
                'productTotal' => Cart::where('session', session()->getId())->where('products_id', $product->products_id)->sum('price'),
                'restaurants_id' => $product->restaurants_id,
                'categories_id' => $product->categories_id,
                'quantity' => Cart::where('session', session()->getId())->where('products_id', $product->products_id)->sum('quantity'),
            );
        }

        return array('items' => $cartItems, 'total' => $total);

    }
}
