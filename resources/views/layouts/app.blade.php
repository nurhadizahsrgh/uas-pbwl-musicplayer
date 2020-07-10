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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #F5F5F5;
                color: #000;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            table {
                margin-top: 10px;
                margin-bottom: 10px;
                border: 1px solid #bfbfc0;
                border-collapse: collapse;
                width: 800px;
                margin-left: auto;
                margin-right: auto;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    }
            table th {
                text-align: left;
                width: 300px;
                border: 1px solid #8e8e8e;
                padding: 10px;
                background-color: #aa90ff;
                color: #000;
            }
            table td {
                border: 1px solid #8e8e8e;
                padding:10px;
                background-color: #fff;
                color: #000;
            }

            <button type="button" class="btn btn-success"></button>
            <button type="button" class="btn btn-danger"></button>
            <button type="button" class="btn btn-primary"></button>

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 1px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #05060b;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                <a id="app" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
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
                            <a class="nav-link" href="{{ url('/artist') }}">Artis</a>
                            <a class="nav-link" href="{{ url('/album') }}">Album</a>
                            <a class="nav-link" href="{{ url('/track') }}">Track</a>
                            <a class="nav-link" href="{{ url('/played') }}">Played</a>
                            <a class="nav-link" href= v-pre> {{ Auth::user()->name }}</a>
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        @endguest
                    </ul>
  </div>
  </div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
