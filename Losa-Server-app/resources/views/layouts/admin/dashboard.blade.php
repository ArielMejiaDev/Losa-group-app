<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
  <meta name="author" content="Ariel Salvador">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Losa') }}</title>
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  {{--  Custom styles for this template  --}}
  <link href="{{ mix('css/sb-admin-2.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('css/spinner.css') }}">
  {{-- JS --}}
  <script src="{{ asset('js/jquery.min.js') }}" defer></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/sb-admin-2.js') }}" defer></script>
  <script src="{{ mix('js/chartjs.js') }}" defer></script>

</head>

<body id="page-top">

  <div id="loader" class="d-none h-100 bg-blue">
      <div class="spinner align-items-center justify-content-center">
          <div class="dot1"></div>
          <div class="dot2"></div>
      </div>
  </div>

  <div id="app">

    {{--  Page Wrapper  --}}
    <div id="wrapper">

      @include('partials.dashboard.sidebar')

      {{--  Content Wrapper  --}}
      <div id="content-wrapper" class="d-flex flex-column">

        {{--  Main Content  --}}
        <div id="content">

          @include('partials.dashboard.navbar')

          {{--  Begin Page Content  --}}
          <div class="container-fluid">

            @yield('content')

          </div>
          {{--  container-fluid  --}}

        </div>
        {{--  End of Main Content  --}}

        @include('partials.dashboard.footer')

      </div>
      {{--  End of Content Wrapper  --}}

    </div>
    {{--  End of Page Wrapper  --}}

    @include('partials.dashboard.modal-logout')

  </div>
  <script src="{{ asset('js/loaderSpinner.js') }}"></script>
  @stack('scripts')
  
  @include('partials.dashboard.chartjs')
  
</body>
</html>