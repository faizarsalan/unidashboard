<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">

    <style>
    .fa {
        padding: 20px;
        font-size: 30px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        color: rgba(52,44,40,158);
    }

    .fa:hover {
        opacity: 0.7;
    }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-lightshadow-sm" style="background-color:rgba(200,160,160,255)">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../storage/logo.png" alt="" width="100vw" height="100vw">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav me-auto d-flex justify-content-between" style="width:30vw; margin-left:10vw;">
                        <a style="color:whitesmoke" href="{{ url('/') }}">Home</a>
                        <a style="color:whitesmoke" href="">About</a>
                        <a style="color:whitesmoke" href="">Team</a>
                        <a style="color:whitesmoke"  href="">Explore</a>
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style="width: 55vw">
                        <!-- Authentication Links -->
                        @guest
                        <ul class="navbar-nav me-auto d-flex justify-content-between" style="width:30vw;">
                            <a style="color:whitesmoke;font-size:1.3vw" href="{{ url('/') }}">Home</a>
                            <a style="color:whitesmoke;font-size:1.3vw" href="/#about" id="about-page">About</a>
                            <a style="color:whitesmoke;font-size:1.3vw" href="/#team" id="team-page">Team</a>
                            <a style="color:whitesmoke;font-size:1.3vw"  href="/#explore" id="explore-page">Explore</a>
                        </ul>
                        <div class="buttons" style="display:flex;justify-content:space-between;width:13vw">
                            @if (Route::has('login'))
                                <li class="nav-item ms-4">
                                    <a class="btn" style="background-color: white;color:rgba(200,160,160,255);" href="/login" role="button">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" style="color:white;" href="/register" role="button">Register</a>
                                </li>
                            @endif
                        </div>
                        @else
                            <li class="nav-item dropdown" style="margin-left: 50vw">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color:white" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="">
            {{-- py-4 --}}
            @yield('content')
        </main>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
