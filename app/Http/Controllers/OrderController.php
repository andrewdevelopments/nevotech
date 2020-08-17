<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrdersProducts;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {

        $products = $this->getCart();

        $order_get_id = Order::latest()->first('order_id');

        if($order_get_id != null) {
            $order_id = $order_get_id->order_id + 1;
        }
        else {
            $order_id = 1;
        }

        //dd($products);

        return view('order', compact('products', 'order_id'));

    }

    public function edit(Request $request) {

        //dd($request->all());

        $order = new Order;
        $order->order_id = $request->order_id;
        $order->user_session = $request->user_session;
        $order->order_total = $request->order_total;
        $order->order_status = $request->order_status;
        $order->shipping_firstname = $request->shipping_firstname;
        $order->shipping_lastname = $request->shipping_lastname;
        $order->shipping_email = $request->shipping_email;
        $order->shipping_telephone = $request->shipping_telephone;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_zipcode = $request->shipping_zipcode;
        $order->shipping_address = $request->shipping_address;
        $order->restaurants_id = $request->restaurants_id;
        $order->save();

        foreach( $this->getCart()['items'] as $movingDataInfo ) {

            $cartProducts = new OrdersProducts;
            $cartProducts->orders_id = $request->order_id;
            $cartProducts->user_session = $request->user_session;

            $cartProducts->products_id = $movingDataInfo['id'];
            $cartProducts->quantity = $movingDataInfo['quantity'];
            $cartProducts->price = $movingDataInfo['price'];
            $cartProducts->name = $movingDataInfo['name'];
            $cartProducts->save();

        }

        Cart::where('session', session()->getId())->delete();

        session()->flash('message', 'Comanda a fost creata');
        return redirect('/');
    }
}
