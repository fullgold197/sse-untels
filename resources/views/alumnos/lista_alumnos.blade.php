@extends('adminlte::page')

@section('title', 'Lista de egresados')

@section('content_header')

@stop

@section('content')
<link href="{{ asset('css/alumnos.css') }}" rel="stylesheet">

    <div class="container" id="">
        <h4 >Lista de alumnos</h4>
        {{--  Buscar  --}}
        <div class="row" >
            {{--  class="col-xl-12" para indicar que se va a dividir en 12 columnas  --}}
            <div class="col-xl-12" >
                <form action="/alumnos/crear" method="POST">

                        @csrf
                        <label>Nombre:</label>
                        <input type="text" name="nombre" placeholder="Su nombre"><br>
                        <label>Apellido:</label>
                        <input type="text" name="apellido" placeholder="Su Apellido"><br>
                        <label>Edad:</label>
                        <input type="text" name="edad" placeholder="Su edad"><br>
                        <label>Dirección:</label>
                        <input type="text" name="direccion" placeholder="Su dirección">

                        <input type="submit" value="Guardar">
                    </form>

                </form>

            </div>
        </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

