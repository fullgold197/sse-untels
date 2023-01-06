<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Imagen del title -->
    <link rel="shortcut icon" href="{{asset('images/untels/untels.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="/fontawesome-free-5.15.4-web/js/all.js"></script>
    <!--load all styles para fontawesone con svg js -->
    <link href="/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <!--load all style con css para fontawesome (ya no se usa)-->

    <!-- Style -->
    <link rel="stylesheet" href="assets/css/styles1.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
</head>
<!-- Da espacio entre div-->
<link rel="stylesheet" href="{{asset('css/letras.css')}}">

<body style="background-color:#004A98">
    @yield('content')


</body>