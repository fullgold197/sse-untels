<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="DgJGD2Z8KYouB74sM3zjhZHWcwoaQ3GinV6eUMGN">
    <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css')}} ">

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css')}} ">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link rel="stylesheet" href="/css/admin_custom.css">
        <link rel="stylesheet" href="{{ asset('css/letras.css') }}">
    <!-- Imagen del title -->
    <link rel="shortcut icon" href="{{asset('images/untels/untels.png')}}">


</head>

<body class="sidebar-mini" >
    <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
        </a>
        </li>
    </ul>


    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    <li class="nav-item dropdown user-menu">
    @php
        $url=Auth::user()->url
    @endphp
    <li class="">
        <img src="{{asset($url)}}"
         alt="{{asset($url)}}"
         class="brand-image img-circle elevation-4"
         style="opacity:.8" width="33">
    </li>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}</a>


    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
       {{--   <a class="dropdown-item" href="#">
        {{ __('Mi perfil') }}
        </a>
        <a class="dropdown-item" href="{{  url("/profile/password")}}">
        {{ __('Cambiar contraseña') }}
        </a>  --}}

        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Cerrar Sesion') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
    </div>
    </li>


</li>


            </ul>

</nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('home')}}"
            class="brand-link ">


    <img src="{{ asset('images/untels/untels.png') }}"
         alt="AdminLTE"
         class="brand-image img-circle elevation-3"
         style="opacity:.8">


    <span class="brand-text font-weight-light ">
        <b>Egresados UNTELS</b>
    </span>

</a>


    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column "
                data-widget="treeview" role="menu">


<li class="nav-item ">
    <a class="{{ (request()->is('home')) ? 'nav-link active' : 'nav-link' }}"
       href="{{route('home')}}">
        <i class="fas fa-fw fa-home "></i>
        <p>Inicio</p>
    </a>
</li>



<li class="nav-item">
    <a class="{{ (request()->is('home/datos-personales')) ? 'nav-link active' : 'nav-link' }}"
        href="{{route('datos-personales.index')}}">
        <i class="fas fa-fw fa-graduation-cap "></i>
        <p>Datos personales</p>
    </a>
</li>






<li  class="nav-item">

    <a
        class="{{ (request()->is('home/trayectoria-academica')) ? 'nav-link active' : 'nav-link' }}"
       href="{{route('trayectoria-academica.index')}}">
        <i class="fas fa-university"></i>
        <p>Trayectoria académica</p>
    </a>

</li>





<li  class="nav-item">
    <a class="{{ (request()->is('home/trayectoria-profesional')) ? 'nav-link active' : 'nav-link' }}"

       href="{{route('trayectoria-profesional.index')}}">
        <i class="fas fa-user-tie"></i>
        <p>Trayectoria profesional</p>
    </a>
</li>

<li  class="nav-item">
    <a class="{{ (request()->is('home/password')) ? 'nav-link active' : 'nav-link' }}"

       href="{{route('password')}}">
        <i class="fas fa-unlock-alt"></i>
        <p>Mi contraseña</p>
    </a>
</li>

    </ul>
        </nav>
    </div>

</aside>


                    <div class="content-wrapper ">


            <div class="content-header">
            <div class="container-fluid">

            </div>
        </div>


    <div class="content">
        <div class="container-fluid">
                @yield('content')
        </div>
    </div>

</div>





    </div>


            <script src="{{ asset('vendor/jquery/jquery.min.js')}} "></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>



        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- JQuery -->
        <!--Aquí se utiliza JQuery para permitir seleccionar la fecha de finalización del egresado o la opcion de estar laborando-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--libreria para utilizar JQuery-->
        <!--Para la trayectoria profesional-->
        <script>
            $(document).ready(function(){
                $('form input[type="submit"]').prop("disabled", false);
                $(".agree").click(function(){
                    if($(this).prop("checked") == true){
                        $('form input[id="fecha_finalizacion"]').prop("disabled", true); //aqui estamos diciendo que el input que contenga un id="fecha de finalización automaticamente se desabilite la fecha de finalizacion de empleo del egresado"
                    }
                    else if($(this).prop("checked") == false){
                        $('form input[id="fecha_finalizacion"]').prop("disabled", false);
                    }
                });
            });
        </script>





                <script> console.log('Hi!'); </script>

</body>

</html>
