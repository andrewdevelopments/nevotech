@extends('components.layout')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h3>Finalizare comanda</h3>
            </div>

            <div class="col-8 offset-2 mt-5">

                <form action="{{ route('order.edit') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="d-none">
                        <input type="text" name="user_session" value="{{ Session()->getId() }}">
                        <input type="text" name="order_total" value="{{ $products['total'] }}">
                        <input type="text" name="order_status" value="1">
                        <input type="text" name="restaurants_id" value="{{ $products['items'][0]['restaurants_id'] }}">
                        <input type="text" name="order_id" value="{{ $order_id }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="shipping_firstname">Nume</label>
                            <input type="text" class="form-control" id="shipping_firstname" name="shipping_firstname">
                        </div>
                        <div class="form-group col-6">
                            <label for="shipping_lastname">Prenume</label>
                            <input type="text" class="form-control" id="shipping_lastname" name="shipping_lastname">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="shipping_email">Email</label>
                            <input type="email" class="form-control" id="shipping_email" name="shipping_email">
                        </div>
                        <div class="form-group col-6">
                            <label for="shipping_telephone">Telefon</label>
                            <input type="text" class="form-control" id="shipping_telephone" name="shipping_telephone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="shipping_city">Oras</label>
                            <select name="shipping_city" id="shipping_city" class="form-control">
                                <option value="Bucuresti - Sectorul 1">Bucuresti - Sectorul 1</option>
                                <option value="Bucuresti - Sectorul 2">Bucuresti - Sectorul 2</option>
                                <option value="Bucuresti - Sectorul 3">Bucuresti - Sectorul 3</option>
                                <option value="Bucuresti - Sectorul 4">Bucuresti - Sectorul 4</option>
                                <option value="Bucuresti - Sectorul 5">Bucuresti - Sectorul 5</option>
                                <option value="Bucuresti - Sectorul 6">Bucuresti - Sectorul 6</option>
                                <option value="Constanta">Constanta</option>
                                <option value="Navodari">Navodari</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="shipping_state">Judet</label>
                            <select name="shipping_state" id="shipping_state" class="form-control">
                                <option value="Bucuresti">Bucuresti</option>
                                <option value="Constanta">Constanta</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="shipping_zipcode">Cod postal</label>
                            <input type="text" class="form-control" id="shipping_zipcode" name="shipping_zipcode">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="shipping_address">Adresa</label>
                            <input type="text" class="form-control" id="shipping_address" name="shipping_address">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group col-12 text-right">
                            <span><strong>Total: {{ $products['total'] }} RON</strong></span>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Finalizeaza comanda</button>
                        </div>
                    </div>

                </form>

            </div>

{{--            @foreach($products['items'] as $item)--}}
{{--                {{ $item['name'] }}--}}
{{--            @endforeach--}}

        </div>
    </div>

@endsection
