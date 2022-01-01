@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

@stop

@section('content')
    <body>
    <div class="container">
        <h4>Gestion de Egresados</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('egresado.index')}}" method="GET">

                    <div class="form-row">
                        <div class="col-sm-4 my-2">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-sm-8 my-2">
                            <input type="submit" class="btn btn-dark"  value="Buscar">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-auto my-2">

                <button type="button" class="btn btn-primary" id="open" data-bs-toggle="modal" data-bs-target="#modal-create">
                    <i class="fas fa-user"> Nuevo Egresado</i>
                    </button>
                        </div>

                    </div>
                </form>
            </div>
            </div>
        </div>
            <div class="container">
            <div class="col-xl-12">
                <div class="row">
                    <div class="form-row">
            <div class="col-auto my-1" >
                <a href="{{ route('imprimir', $valor2)}}"  target="_blank" class="btn btn-danger" ><i class="fas fa-file-pdf"></i></a>
                </div>
                <div class="col-auto my-1" >
                    <a href="{{ route('egresados.Export-excel')}}"  target="_blank" class="btn btn-success" ><i class="fas fa-file-export"></i></a>
                    </div>
            <div class="col-auto my-1">

                <a href="{{ route('egresados.Import-excel')}}" class="btn btn-warning" ><i class="fas fa-upload"></i></a>
                </div>

            </div>
        </div>

    </div>

    </div>
            <div class="col-xl-12 my-2">
                <div class="table-responsive ">
                    <table class="table table-striped" >
                        <thead>
                            <tr class="text-center">
                                <th>Código</th>
                                <th>Egresado</th>
                                <th>Carrera</th>
                                <th>Nombres</th>
                                <th>Semestre de ingreso</th>
                                <th>Semestre de egreso</th>
                                <th>Celular</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($egresados)<=0)
                                <tr class="text-center">
                                    <td colspan="8">No hay resultados</td>
                                </tr>
                            @else
                                @foreach ($egresados as $egresado)
                            <tr class="text-center">
                                <td>{{$egresado->matricula}}</td>

                                <td>
                                    <li class="nav-link ">
                                    <img src="{{asset($egresado->url)}}"
                                    alt="{{asset($egresado->url)}}"
                                    class="brand-image img-circle elevation-4"
                                    style="opacity:.8" width="40">
                                    </li>
                                </td>

                                <td>{{$egresado->carr_profesional}}</td>
                                <td class="text-capitalize">{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</td>
                                <td>{{$egresado->semestre_ingreso}}</td>
                                <td>{{$egresado->semestre_egreso}}</td>
                                {{--  <td>{{$egresado->genero}}</td>
                                <td>{{$egresado->fecha_nacimiento}}</td>  --}}
                                <td>{{$egresado->celular}}</td>
                                <td>

                                <!-- Button trigger modal -->
                                <form action="{{route('academico-profesional.index')}}" method="GET">
{{--                                 <a href="{{route('academico-profesional.index')}}">
 --}}
                                <button type="submit" class="btn btn-info btn-sm"      data-bs-toggle="modal" data-bs-target="#modal">
                                <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>
                                <input type="hidden" name="matricula_id" value="{{$egresado->matricula}}">
                            </form>

                                </a>

                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$egresado->matricula}}">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$egresado->matricula}}">
                                <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>

                            </tr>
                            {{-- Poner aquí los include. No sé porque aqui los leé. --}}
                            @include('admin.egresado.crear')
                            @include('admin.egresado.edit')
                            @include('admin.egresado.delete')
                            @include('admin.egresado.trayectoriacademica')
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    {{$egresados->links()}}

                </div>

            </div>

        </div>

    </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
