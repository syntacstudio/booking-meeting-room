<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="stripe" content="{{ env('STRIPE_KEY') }}">
    <title>@yield('page.title') • Administrator</title>
    <script src="https://checkout.stripe.com/checkout.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ active_nav('admin') }}" href="{{ route('admin') }}">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_nav('admin.bookings') }}" href="{{ route('admin.bookings') }}">BOOKINGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_nav('admin.rooms') }}" href="{{ route('admin.rooms') }}">MANAGE ROOM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_nav('admin.customers') }}" href="{{ route('admin.customers') }}">CUSTOMERS</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout <i class="fa fa-sign-out"></i>
                                </a>
                                <form id="logout-form" method="post" class="d-none" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="border-top bg-white">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline">
                           <li class="list-inline-item"><a class="text-dark" href="#">PRIVACY POLICY</a></li>
                           <li class="list-inline-item"><a class="text-dark" href="#">CONTACT US</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        Copyright © <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
