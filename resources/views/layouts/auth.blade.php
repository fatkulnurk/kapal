<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @stack('head')
</head>
<body>
<div id="app">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('adminlte-3.0.2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte-3.0.2/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('adminlte-3.0.2/dist/js/demo.js') }}"></script>

@stack('javascript')
</body>
</html>

