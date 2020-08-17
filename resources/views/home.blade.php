@extends('components.layout')

@section('content')

    <div class="container">
        <div class="row">

            @foreach( $restaurants as $restaurant )

                <div class="col-3 mb-5">
                    <div class="restaurant">

                        <div class="restaurant-image position-relative">

                            <a href="/restaurant/{{$restaurant->id}}" title="{{ $restaurant->name }}">
                                @if($restaurant->status == 0)
                                    <div class="restaurant-status">Closed</div>
                                @endif
                                <img src="/images/restaurant/{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
                            </a>
                        </div>

                        <div class="restaurant-body px-3 py-4">

                            <div class="restaurant-name mb-1">
                                <a href="/restaurant/{{$restaurant->id}}" title="{{ $restaurant->name }}">{{ $restaurant->name }}</a>
                            </div>

                            <div class="restaurant-address">
                                <p class="m-0">{{ $restaurant->address }}</p>
                            </div>

                        </div>

                    </div>
                </div>

            @endforeach

        </div>
    </div>

@endsection
