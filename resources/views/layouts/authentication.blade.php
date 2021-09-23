<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>P.T Saputra Tirtha Amertha</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  @yield('css-libraries')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/css/style.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/css/components.min.css') }}">
</head>

<body>
  <div id="app">
    @yield('content')
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/popper.js') }}"></script>
  <script src="{{ asset('stisla/modules/tooltip.js') }}"></script>
  <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/moment.min.js') }}"></script>
  <script src="{{ asset('stisla/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  @yield('js-libraries')

  <!-- Page Specific JS File -->
  @yield('page-specific-js')

  <!-- Template JS File -->
  <script src="{{ asset('stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/js/custom.js') }}"></script>
</body>

</html>