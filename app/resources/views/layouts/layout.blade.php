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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <nav class="navbar fixed-top navbar-light " style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="{{ url('/') }}">ロゴ</a>
        <div class="my-navbar-control">
                @if(Auth::check())
                    <span class="my-navbar-item">{{ Auth::user()->image }}</span>
                    /
                    <a href="{{ route('login')}}" id="logout" class="my-navbar-item">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form>
                    <span class="navbar-item">
                    アイコン
                    </span>
                    <script>
                       document.getElementById('logout').addEventListener('click',function(event) {
                       　　　event.preventDefault();
                       　　　document.getElementById('logout-form').submit();    
                       });
                    </script>
                @else
                    <a class="navbar-item" href="{{ route('users.index')}}">
                    アイコン
                    </a>
                    <!-- <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                    /
                    <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a> -->
                @endif
            </div>
        <!-- <div class="d-flex justify-content-around">
            
            <a class="navbar-item" href="#">ログアウト</a>
        </div> -->
    </nav>
</body>
</html>
