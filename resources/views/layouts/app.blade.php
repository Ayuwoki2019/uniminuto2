<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Uniminuto</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        #main {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('/images/imagen.webp');
            width: 100%;
            height: calc(100vh - 56px);
        }

        .content-inicio {
            margin: 20px 100px;
            padding: 20px;
            border-radius: 20px;
            background-color: white;
        }

        .content-inicio-title {
            text-align: center;
            margin: 20px 0:
        }

        .content-inicio-button {
            position: fixed;
            bottom: 80px;
            right: 100px;
            width: 55px;
            height: 55px;
            outline: initial;
            background-color: white;
            border: 1px solid green;
            border-radius: 9999px;
            display: grid;
            justify-content: center;
            align-items: center;
            z-index: 20;
        }

        .content-inicio-button-svg {
            fill: green;
        }

        .navbar-brand-container {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        
        .navbar-brand-container:hover {
            text-decoration: none;
        }

        .navbar-brand-image {
            width: 40px;
            height: 40px;
            background-image: url('/images/OIP.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin-right: 10px;
        }

        .navbar-brand-text {
            margin: 0;
            color: black;
            font-size: 20px;
        }

        .my-button {
            background-color: red;
            border-radius: 9999px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand-container" href="{{ url('/') }}">
                    <div class="navbar-brand-image"></div>
                    <p class="navbar-brand-text">
                        Uniminuto
                    </p>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" id="main">
            @yield('content')
            @yield('css')
            @yield('js')
        </main>
    </div>
</body>
</html>
