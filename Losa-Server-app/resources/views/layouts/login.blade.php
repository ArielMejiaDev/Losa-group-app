<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Losa') }}</title>
    <link rel="stylesheet" href="{{ mix('css/login.css') }}">
    <link href="{{ mix('css/spinner.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
  <div id="app">
    @yield('content')
  </div>
</body>
</html>