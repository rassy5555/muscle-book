<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '筋肉図鑑') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bcee29e651.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="l-header">
            <div class="l-header__wrapper p-header__wrapper">
                <div class="p-header__logo">筋肉図鑑</div>
                <div class="p-header__menuTrigger js-toggle-sp-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="p-header__menuList js-toggle-sp-menu-target">
                    <ul>
                        <li class="p-header__menuItem"><a href="register">{{ __('Register') }}</a></p>
                        <li class="p-header__menuItem"><a href="login">{{ __('Login') }}</a></p>
                        <li class="p-header__menuItem">
                            <a class="p-header__menuItem" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>
