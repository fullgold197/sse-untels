@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Ofertas labores de Ingeniería de Sistemas</h1>
@stop

@section('content')
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

    {{--  Crear nuevo egresado  --}}
    <div class="row" >
        <div class="col-xl-12" >
            <button type="button" class="btn btn-primary" id="open" data-bs-toggle="modal" data-bs-target="#modal-create">
                <i class="fas fa-user"> Crear Oferta Laboral</i>
            </button>
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
                            <th colspan="2">Opciones</th>
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
                                <td><a href="{{$of_laboral->url}}">{{$of_laboral->url}}</a></td>
                                <td>
                                    {{--  Editar oferta laboral --}}
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$of_laboral->id_of_laborales}}">
                                    <i class="fas fa-edit"></i>
                                    </button>
                                    {{--  Eliminar oferta laboral --}}
                                    <button type="button" class="btn btn-danger btn-sm my-1" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$of_laboral->id_of_laborales}}">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                                    </td>
                                    @include('admin.ofertas_laborales.delete')
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{--  Permite mostrar los egresados en paginaciones. El comando appends permite que la variable de busqueda no se pierda. Es necesario poner el nombre de la variable.  --}}
                {{-- {{$egresados->appends(['texto'=>$texto,'tipo_filtrado'=>$tipo_filtrado,'orden'=>$orden])->links()}} --}}

            </div>
            @include('admin.ofertas_laborales.create')
        </div>


</div>

</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop
