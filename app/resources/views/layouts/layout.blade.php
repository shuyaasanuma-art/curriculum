<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'スキー') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/follow.js') }}" defer></script>
    <script src="{{ asset('js/like.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
   <div id="app">
    <nav class="navbar fixed-top navbar-light " style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="{{ url('/') }}"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M209.7 3.4c15.8-7.9 35-1.5 42.9 14.3l25 50 42.4 8.5c19.5 3.9 37.8 12.3 53.5 24.5l126.1 98.1c14 10.9 16.5 31 5.6 44.9s-31 16.5-44.9 5.6l-72.1-56.1-71.5 31.8 33.1 27.6c23.2 19.3 33.5 50 26.7 79.4l-17.4 75.2c-2.2 9.4-8.2 16.8-16.1 21l86.5 33.1c4.6 1.8 9.4 2.6 14.3 2.6H472c13.3 0 24 10.7 24 24s-10.7 24-24 24H443.8c-10.8 0-21.4-2-31.5-5.8L60.1 371.3c-11.5-4.4-22-11.2-30.8-20L7 329c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.4 22.4c4 4 8.7 7.1 14 9.1l22.4 8.6c-.8-1.6-1.5-3.2-2.1-4.9c-5.6-16.8 3.5-34.9 20.2-40.5L192 264.9l0-53.2c0-24.2 13.7-46.4 35.4-57.2l45.2-22.6-7.5-1.5c-19.4-3.9-35.9-16.5-44.7-34.1l-25-50c-7.9-15.8-1.5-35 14.3-42.9zM139 350.1l159 60.9c-2.1-5.6-2.6-11.9-1.1-18.2l17.4-75.2c1.4-5.9-.7-12-5.3-15.9l-52.8-44 0 18.8c0 20.7-13.2 39-32.8 45.5L139 350.1zM432 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
        <div class="my-navbar-control">
                @if(Auth::check())
                    <a class="my-navbar-item" href="{{ route('users.index')}}"><img src="{{ Storage::url(optional($users)->image)}}" class="rounded-circle"  width="50" height="50"></a>
                    /
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    ログアウト
                    </a>
                    <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
                      @csrf
                    </form>

                    
                @else

                @endif
            </div>
    </nav>
    @yield('content')
   </div>
</body>
</html>
