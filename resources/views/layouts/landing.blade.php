<!doctype html>
<html lang="en">
  <head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <title>UEFA Champions League Table</title>
  </head>
  <header>
  <nav>
  <img src="{{ asset('images/Logo.svg') }}" alt="Logo" height="48" width="48"/>
  <span class="title">UEFA Champions League Table</span>  
  </nav>
  </header>
  <body>
    @yield('content')
    {{-- Javascript --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
  </body>
</html>