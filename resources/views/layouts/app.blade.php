<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <form class="form-inline">
                            <a class="btn btn-outline-success" href="{{ route('deals.add') }}">Wydaj</a>
                            <a class="btn btn-outline-success" href="{{ route('deals.index') }}">Lista wydań</a>
                            <a class="btn btn-outline-warning" href="{{ route('product.index') }}">Produkty</a>
                            <a class="btn btn-outline-warning" href="{{ route('employee.index') }}">Pracownicy</a>
                        </form>
                    </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn btn-outline-primary" href="{{ route('login') }}">Zaloguj</a>
                            </li>
                        @endif
                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <b>{{ Auth::user()->name }}</b>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Wyloguj
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
        </main>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-muted">&copy; {{ config('app.name', 'Laravel') }} | Wersja: {{ config('app.version') }} </p>

              <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              </a>

              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link px-2 text-muted">About</a></li>
              </ul>
            </footer>
          </div>
    </div>
</body>

    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js']) --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</html>
