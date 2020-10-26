<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Scripts -->
  <!-- Laravel標準搭載のJavascript -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- 下2行はbootstrapのJavascript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Fonts -->
  <link href="https://fonts.gstatic.com" rel="dns-prefetch">
  <link href="https://fonts.googleapis.com/css?family=Oswald:700"rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <!-- bootstrapのcss -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('js/app.js') }}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="/css/app.css"> -->
  <!-- <link rel="stylesheet" href="/css/admin.css">  -->
</head>
<body class="bg-white">
  <header>
    <div class="fixed-navbar-mobile">
      <nav class="navbar navbar-default bg-transparent navbar-light navbar-expand-sm">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-hamburger" aria-controls="navbar-hamburger" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-hamburger">
          <div class="container-fluid">
            <ul class="navbar-nav mr-auto d-none d-sm-block">
              <li class="nav-item active">
              <a class="navbar-brand text-white top-todo-title" href="/" title="Topへ戻る">おかえりTodo</a>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item navbar-light">
                  <a class="btn btn-secondary btn-color" href="/">TOPページ</a>
                @if(Auth::check())
                  <a class="btn btn-secondary btn-color" href="/todo">{{ Auth::user()-> name }}さんのTodo一覧</a>
                  <a class="btn btn-secondary btn-color" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    ログアウト
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @else
                  <a class="btn btn-secondary btn-color" href="/login">ログイン</a>
                  <a class="btn btn-secondary btn-color" href="/register">新規登録</a>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  @yield('content')
</body>
</html>