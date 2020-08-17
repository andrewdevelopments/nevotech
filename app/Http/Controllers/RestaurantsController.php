<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrdersProducts;
use App\ProductsRestaurants;
use App\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Auth::logout();

        $restaurants = Restaurants::paginate(8);

        //dd($restaurants);

        return view('home', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurants $restaurants, $id)
    {

        $restaurant = $restaurants->with('category', 'products')->find($id);
        $total = Cart::where('session', session()->getId())->sum('price');
        $products = ProductsRestaurants::with('restaurants', 'products', 'categories')->where('restaurants_id', $id)->get();

        //dd(session()->getid());

        //dd($products);

        //Auth::logout();

        if(!Auth::user()) {
            return view('restaurant', compact('restaurant', 'products', 'id', 'total'));
        }
        else {

            $orderNumber = Order::where('restaurants_id', $id)->count();
            $restaurantName = $restaurant->name;
            $restaurantAddress = $restaurant->address;

            $orders = Order::where('restaurants_id', $id)->with('products')->get();

            //dd($orders);

            return view('restaurant_orders', compact('orderNumber', 'restaurantName', 'restaurantAddress', 'orders'));

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurants $restaurants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurants $restaurants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurants $restaurants)
    {
        //
    }

}
