<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="stripe" content="{{ env('STRIPE_KEY') }}">
    <title>@yield('page.title') • {{ config('app.name') }}</title>
    <script src="https://checkout.stripe.com/checkout.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ active_nav('home') }}" href="{{ route('home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_nav('browse') }}" href="{{ route('browse') }}">BROWSE ROOMS</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ active_nav('login') }}" href="{{ route('login') }}">LOGIN</a>
                            </li>
                            <li class="nav-item {{ active_nav('register') }}">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    LOGOUT <i class="fa fa-sign-out"></i>
                                </a>
                                <form id="logout-form" method="post" class="d-none" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </li>
                            <li class="nav-item dropdown">
                            @if (Auth::user()->hasRole('admin'))
                                <a class="btn btn-outline-primary ml-md-3" href="{{ route('admin') }}"><i class="fa fa-arrow-left"></i> Back to Admin</a>
                            @else
                                <a class="btn btn-outline-primary ml-md-3" href="{{ route('account') }}"><i class="fa fa-user"></i> My Account</a>
                            @endif
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="border-top">
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
