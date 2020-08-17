@extends('components.layout')

@section('content')

    <div class="restaurant-page">
        <div class="container">

            <div class="row">

                <div class="col-4">
                    <div class="image">
                        <img src="/images/restaurant/{{ $restaurant->image }}" alt="">
                    </div>
                </div>

                <div class="col-8">
                    <h3 class="m-0">Restaurant: {{ $restaurant->name }}</h3>
                    <p class="mb-2">{{ $restaurant->address }}</p>
                    <p class="m-0"><small>Comanda minima: <strong>{{ $restaurant->minimum_order }} RON</strong></small></p>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-12">

                    <ul class="list-unstyled m-0 category-list list-group list-group-horizontal">
                        @foreach($restaurant->category as $category)

                            <li class="list-group-item">
                                <a href="#catergory-{{ $category->id }}" title="{{ $category->name }}">{{ $category->name }} - id {{ $category->id }}</a>
                            </li>

                        @endforeach
                    </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-8">

                    <ul class="restaurant-food mt-5 list-unstyled m-0">

                        @foreach($products as $product)
                            @foreach($restaurant->category as $cat)

                            @if($cat->id == $product->categories->id)

                                    <li data-product-id="{{ $product->products->id }}" data-product-price="{{ $product->products->price }}" class="p-3 mb-3 d-flex align-items-start" title="{{ $product->products->name }}" data-category="{{ $product->categories_id }}">
                                        <div class="product-image mr-3">
                                            <img width="150" src="/images/food/{{ $product->products->image }}" alt="{{ $product->products->name }}">
                                        </div>
                                        <div class="product-info w-100">
                                            <h6 class="m-0">{{ $product->products->name }}</h6>
                                            <p><small>{{ $product->products->description }}</small></p>
                                            <p><strong>{{ $product->products->price }} RON</strong></p>

                                            <div class="product-actions row">

                                                <div class="input-group offset-4 col-4 d-flex align-items-start">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-outline-secondary" onclick="QtyDecrease(this)">-</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center quantity" value="1" min="0">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-outline-secondary" onclick="QtyIncrease(this)">+</button>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <button class="btn btn-danger" type="button" onclick="addToCart( {{ $product->products->id }}, '{{ $product->products->price }}', '{{ $product->products->name }}', {{ $product->categories->id }}, {{ $id }}, '{{ Session()->getId() }}' )">Adauga in cos</button>
                                                </div>

                                            </div>

                                        </div>
                                    </li>

                                @endif

                            @endforeach
                        @endforeach

                    </ul>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        var
            addToCart = function( id, price, name, category_id, restaurant_id, session_id ) {

            // Verificam daca avem produse in cart si ce restaurant_id au ele
            if($('.cart-widget').hasClass('active') && parseInt($('.cart-widget').attr('data-restaurant')) !== restaurant_id) {
                $('.product-actions p').remove();
                $('.product-actions').append('<p style="color: red">Ne pare rau, puteti adauga produse doar de la un restaurant.</p>');
            }
            else {

                $.ajax({
                    url: '/checkout',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: id,
                        price: price,
                        name: name,
                        category_id: category_id,
                        quantity: $('.quantity').val(),
                        restaurant_id: restaurant_id,
                        session_id: session_id,
                    },
                    success:function(data) {
                        if(data.success) {
                            window.location.reload();
                        }
                    }
                });

            }

        },
        QtyIncrease = function(element) {

            let quantity = parseInt($(element).parents('.product-actions').find('.quantity').val());
            $(element).parents('.product-actions').find('.quantity').val(quantity + 1);

        },
        QtyDecrease = function(element) {
            let quantity = parseInt($(element).parents('.product-actions').find('.quantity').val());
            if(quantity > 1) {
                $(element).parents('.product-actions').find('.quantity').val(quantity - 1);
            }
        };

    </script>

    @include('components.cartwidget', ['restaurant' => $restaurant, 'total' => $total])

@endsection
