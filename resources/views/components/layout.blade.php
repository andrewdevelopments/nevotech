<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    @yield('style')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    @include('components.navigation')

    <div id="app">
        @yield('content')
    </div>

    @if (session()->has('message'))
        <div class="popup alert saving">
            <div class="alert-inner">
                <span>{{session()->get('message')}}</span>
            </div>
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script>
        $(window).on('load', function() {
            if( $('.popup').length ) {
                setTimeout(function() {
                    $('.popup').fadeIn('slow');
                }, 10);
                setTimeout(function() {
                    $('.popup').fadeOut('slow');
                }, 2000);
            }
        });
    </script>
    @yield('scripts')

</body>
</html>
