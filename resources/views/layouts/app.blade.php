<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} | @endif{{ trans('app.name') }}</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ secure_asset('images/favicon.png') }}">

    <!-- Open Graph Tags -->
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@if(isset($title)){{ $title }} |@endif {{ trans('app.name') }}" />
    <meta property="og:url" content="{{ secure_url()->full() }}" />
    <meta property="og:site_name" content="{{ trans('app.name') }}" />
    <meta property="og:image" content="{{ secure_asset('images/open_graph.jpg') }}" />
    <meta property="og:image:secure_url" content="{{ secure_asset('images/open_graph.jpg') }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bc64da80c55ed0011c0228a&product=inline-share-buttons' async='async'></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139873462-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-139873462-1');
    </script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="{{ secure_url('/') }}">
                    {{ trans('app.name') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Homepage') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('issues.index') }}">{{ __('Issues') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('packages.index') }}">{{ __('Packages') }}</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my-purchases') }}">{{ __('My Purchases') }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profile') }}" class="dropdown-item">{{ __('Profile') }}</a>
                                <a href="{{ route('order-history') }}" class="dropdown-item">{{ __('Order History') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                            @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" style="color: #f00;" href="{{ route('admin.dashboard') }}">{{ __('Admin Panel') }}</a>
                        </li>
                        @endif

                        </li>
                        @endguest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('packages.stayHome') }}">{{ __('#StayHome') }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main role="main">

            <div class="container">
                @if(Session::has('message'))
                <div class="alert alert-{{ Session::get('class') }}" role="alert">
                    {{ __(Session::get('message')) }}
                </div>
                @endif
            </div>


            @yield('content')

        </main>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">{{ trans('app.name') . ', ' . date('Y') }} - <a href="{{ route('contact') }}">{{ __('Contact') }}</a></p>
            </div>
        </footer>

    </div>

</body>

</html>