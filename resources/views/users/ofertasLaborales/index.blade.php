@extends('layouts.egresado')
@section('title', 'Inicio')
@section('content')

<h5>Ofertas laborales</h5>
<div class="container" id="">
    {{--  Buscar  --}}
    <div class="row" >
        {{--  class="col-xl-12" para indicar que se va a dividir en 12 columnas  --}}
        <div class="col-xl-12" >
            <form action="{{route('egresado.index')}}" method="GET">
                <div class="form-row" >
                    {{--  class="col-sm-3 my-2" para indicar que va a tomar 3 columnas  --}}
                    <div class="col-sm-3 my-2" >
                        <input type="text" placeholder="Buscar" class="form-control" name="texto" value="{{-- {{$texto}} --}}">
                    </div>
                    <div class="col-sm-3 my-2" >
                        <input type="submit" class="btn btn-dark"  value="Buscar">
                    </div>
                </div>

            </form>

        </div>
    </div>




    {{--  Ordenar por campo seleccionado  --}}
    <div class="row" >
        {{--  Seleccion de carreras  --}}
        {{-- La class="col-xl-12" para indicar que se va a dividir en 12 columnas  --}}
        <div class="col-xl-12" >
            <form action="{{route('egresado.index')}}" method="GET">
                <div class="form-row" >
                <div class="col-sm-3 my-2">

                </div>

                {{--  Ordenar por el campo seleccionado  --}}
                <div class="col-sm-3 my-2">

                </div>

                {{--  Ordenar por ascendente o descendente --}}
                <div class="col-sm-3 my-2">

                </div>

                </div>
            </form>
        </div>
    </div>






</div>



                @if(isset($errors) && $errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="col-xl-4">
                    <div class="alert alert-danger" role="alert">
                        {{$error}}


                    </div>
                    </div>

                    @endforeach
                    <div>
                        {{--  {{$matricula_hidden}}  --}}
                    </div>
                @endif

        <div class="col-xl-12 my-2">
            <div class="table-responsive ">
                <table class="table table-striped" >
                    <thead>
                        <tr
                        class="text-center">
                            <th>Imagen</th>
                            <th>Nombre de empresa</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($of_laborales)<=0)
                            <tr class="text-center">
                                <td colspan="9">No hay resultados</td>
                            </tr>
                        @else
                            @foreach ($of_laborales as $of_laboral)
                                <td>{{$of_laboral->imagen}}</td>
                                <td>{{$of_laboral->nombre}}</td>
                                <td><a href="{{$of_laboral->url}}">Link</a></td>


                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>

</div>
</div>
@endsection
