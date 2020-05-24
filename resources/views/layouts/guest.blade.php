<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- icon fontawesome -->
    <script src="https://kit.fontawesome.com/813892e154.js" crossorigin="anonymous"></script>
</head>
<body>
  <div id="container">
    <!-- ヘッダー -->
    <div class="row">
      <header class="col-12 bg-dark text-center">
        <a href="/guest">
          <h1 class="display-2 text-white m-2">
            Cromalog
          </h1>
        </a>
        @auth
        <h5 class="text-white m-2">
          現在、Adminでログインしています。
        </h5>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
          document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt text-white">
            Logout
          </i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
        </form>
        @else
        <p class="text-white m-2">
          勉強したものや、あとで振り返りたいもの書いていきます。<br>
          当分はこれまでに書きためたやつを載せていきます。
        </p>
        @endauth
      </header>
    </div>
    <!-- コンテンツ -->
    <div class="row">
      @yield('contents')
    </div>
    <!-- フッター -->
    <div class="row">
      <footer class="col-12 bg-primary" style="height:105px;">
        <p class="text-center mt-4">
          <a href="https://github.com/yCroma" class="text-dark">
            <i class="fab fa-github fa-2x" style="size: 7x;">
              yCroma
            </i>
          </a>
          <br>
          <a href="{{ route('login') }}" class="pt-1">
            <i class="fas fa-sign-in-alt">
              ログインはこちら
            </i>
          </a>
        </p>
      </footer>
    </div>
  </div>
</body>
</html>
