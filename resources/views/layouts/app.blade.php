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
    <!-- Importando o jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <!-- Importando o js do bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-light bg-faded">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Work Shop</a>
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    @if(Auth::check())
                    <form action="{{url('/logout')}}" method="post">
                    @csrf
                        <button type="submit">Logout</button>
                    </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/viewlogin') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/viewregister') }}">Register</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('serviceorder') }}">Servie Order</a>
                            <a class="dropdown-item" href="{{ route('mark') }}">Marcar</a>
                            <a class="dropdown-item" href="{{ route('model') }}">Modelo</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
