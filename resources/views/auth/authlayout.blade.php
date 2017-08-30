<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'LRM') }}</title>
  <link href="{{asset('/css/vendor/all.css')}}" rel="stylesheet">
  <link href="{{asset('css/app/app.css')}}" rel="stylesheet">
</head>

<body class="login">

  @yield('content')

  <!-- Footer -->
  <footer class="footer">
    <strong>{{ config('app.name', 'LRM') }}</strong> v1.0.0 &copy; Copyright 2017
  </footer>
  <!-- // Footer -->
  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
  <script src="{{asset('/js/vendor/all.js')}}"></script>
  <script src="{{asset('/js/app/app.js')}}"></script>

</body>

</html>
