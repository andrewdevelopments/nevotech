<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">{{ __('Login') }}</a>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}">{{ __('Logout') }}</a>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
