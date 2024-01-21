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
        <a class="navbar-brand" href="{{ url('/') }}">ホーム</a>
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
