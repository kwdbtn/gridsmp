<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Refresh site every 30secs -->
    <meta http-equiv="refresh" content="30" >

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/favicon.png') }}" alt="" width="28" height="28" class="d-inline-block align-text-top">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('summary*') || request()->is('/') ? 'active' : '' }}" href="{{ route('summary') }}">Summary</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('generating-stations*') || request()->is('measurands*') ? 'active' : '' }}" href="{{ route('stations.index') }}">Generating Stations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('generation-profile*') ? 'active' : '' }}" href="{{ route('generation-profile') }}">Generation Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('transmission-stations*') ? 'active' : '' }}" href="{{ route('stations.index') }}">Transmission Stations</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('transmission-voltage-profile*') ? 'active' : '' }}" href="{{ route('stations.index') }}">Transmission Voltage Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('transmission-voltage-profile*') ? 'active' : '' }}" href="{{ route('stations.index') }}">Var Compensation</a>
                        </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            {{-- <br> --}}
            <div class="container">
                <br>
                <small>Browser refreshes automatically every 30 seconds</small>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    @include('partials.init_script')
    @stack('scripts')
    
</body>
</html>
