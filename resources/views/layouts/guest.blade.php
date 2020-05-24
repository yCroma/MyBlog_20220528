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
</head>
<body>
  <div id="container">
    <!-- ヘッダー -->
    <div class="row">
      <header class="col-12 bg-dark">
        <a href="/guest">
          <h1 class="display-2 text-center text-white m-2">
            Cromalog
          </h1>
        </a>
        <p class="text-center text-white m-2">
          勉強したものや、あとで振り返りたいもの書いていきます。<br>
          当分はこれまでに書きためたやつを載せていきます。
        </p>
      </header>
    </div>
    <!-- コンテンツ -->
    <div class="row">
      @yield('contents')
    </div>
    <!-- フッター -->
    <div class="row">
      <footer class="col-12 bg-primary">
        <h1 class="display-2 text-center text-white m-2">
          フッター
        </h1>
      </footer>
    </div>
  </div>
</body>
</html>
