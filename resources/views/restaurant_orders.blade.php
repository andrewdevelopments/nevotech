@extends('components.layout')

@section('content')

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">

                <h4>Comenzile pentru {{ $restaurantName }}: {{ $orderNumber }}</h4>
                <p>Adresa: {{ $restaurantAddress }}</p>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                        <th scope="col">Id Comanda</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Oras</th>
                        <th scope="col">Judet</th>
                        <th scope="col">Adresa</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Status livrare</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)

                        <tr>
                            <td><small>{{ $order->order_id }}</small></td>
                            <td><small>{{ $order->shipping_firstname }} {{ $order->shipping_lastname }}</small></td>
                            <td><small>{{ $order->shipping_email }}</small></td>
                            <td><small>{{ $order->shipping_telephone }}</small></td>
                            <td><small>{{ $order->shipping_city }}</small></td>
                            <td><small>{{ $order->shipping_state }}</small></td>
                            <td><small>{{ $order->shipping_address }}</small></td>
                            <td><small>{{ $order->order_total }} RON</small></td>
                            <td>
                                @if($order->order_status == 1)
                                    <small>Comanda in curs de procesare</small>
                                @elseif($order->order_status == 0)
                                    <small>Comanda finalizata</small>
                                @endif
                            </td>
                            <td><small>Nepreluat</small></td>
                        </tr>
                        @foreach( $order->products as $product )
                            <tr>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"><small>{{ $product->name }}</small></td>
                                <td style="background: #e1e1e1;"><small>{{ $product->price }} RON</small></td>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"></td>
                                <td style="background: #e1e1e1;"></td>
                            </tr>
                        @endforeach

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
