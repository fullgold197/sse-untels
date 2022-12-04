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
