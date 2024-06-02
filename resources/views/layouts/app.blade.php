<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts and Icons -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <style>
            /* Adjustments for the navigation bar */
            .navbar {
                padding: 1rem;
            }



            .navbar-brand img {
                width: 60px;
                height: auto;
            }

            .navbar-nav .nav-link {
                padding: .5rem 1rem;
                margin: 0 .25rem;
            }

            .navbar-collapse {
                justify-content: flex-end;
            }
        </style>
        @viteReactRefresh
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <nav class="navbar navbar-expand-md  navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/image/Preview9.png" alt="Laravel Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @if (Auth::user())
                            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="/filiere" class="nav-link">Filiere</a></li>
                            <li class="nav-item"><a href="/groupe" class="nav-link">Groupe</a></li>
                            <li class="nav-item"><a href="/stagiaire" class="nav-link">Stagiaire</a></li>
                        @endif
                    </ul>

                    <!-- Authentication Links -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        <div class="container mt-5">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
