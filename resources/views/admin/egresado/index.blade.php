@extends('adminlte::page')

@section('title', 'Lista de egresados')

@section('content_header')

@stop

@section('content')
<link href="{{ asset('css/letras.css') }}" rel="stylesheet">
<link href="{{ asset('css/espacio_div.css') }}" rel="stylesheet">


    <div class="container" id="">
        <h4 >Gestion de Egresados</h4>
        {{--  Buscar  --}}
        <div class="row" >
            {{--  class="col-xl-12" para indicar que se va a dividir en 12 columnas  --}}
            <div class="col-xl-12" >
                <form action="{{route('egresado.index')}}" method="GET">
                    <div class="form-row" >
                        {{--  class="col-sm-3 my-2" para indicar que va a tomar 3 columnas  --}}
                        <div class="col-sm-3 my-2" >
                            <input type="text" placeholder="Buscar" class="form-control" name="texto" value="{{$texto}}">
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
                        <select name="texto" class="form-control"  id="texto" required>
                            <option selected disabled value="">Seleccione filtro</option>
                            <option value="">Todas las carreras</option>
                            <option value="Ingeniería de Sistemas" {{$texto=="Ingeniería de Sistemas" ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                            <option value="Ingeniería Electrónica y Telecomunicaciones" {{$texto=="Ingeniería Electrónica y Telecomunicaciones" ? 'selected' : '' }}>Ingeniería Electrónica y Telecomunicaciones</option>
                            <option value="Ingeniería Ambiental" {{$texto=="Ingeniería Ambiental" ? 'selected' : '' }}>Ingeniería Ambiental</option>
                            <option value="Ingeniería Mecánica y Eléctrica" {{$texto=="Ingeniería Mecánica y Eléctrica" ? 'selected' : '' }}>Ingeniería Mecánica y Eléctrica</option>
                            <option value="Administración de Empresas" {{$texto=="Administración de Empresas" ? 'selected' : '' }}>Administración de Empresas</option>
                            </select>
                    </div>

                    {{--  Ordenar por el campo seleccionado  --}}
                    <div class="col-sm-3 my-2">
                            {{-- Para evitar que la página pierda el dato que estamos buscando en necesario poner un selected. {{$tipo_filtrado=="matricula" ? 'selected' : '' }}.
                            Aqui se captura la variable $tipo_filtrado que viene del controlador EgresadoAdminController e iguala con el campo que se desee.  --}}
                            <select name="tipo_filtrado" class="form-control"  id="tipo_filtrado" required>
                            <option selected disabled value="">Seleccione campo</option>
                            <option value="matricula" {{$tipo_filtrado=="matricula" ? 'selected' : '' }}>Código de matricula</option>
                            <option value="ap_paterno" {{$tipo_filtrado=="ap_paterno" ? 'selected' : '' }}>Apellidos y nombres</option>
                            <option value="dni" {{$tipo_filtrado=="dni" ? 'selected' : '' }}>DNI</option>
                            <option value="año_ingreso" {{$tipo_filtrado=="año_ingreso" ? 'selected' : '' }}>Año de ingreso</option>
                            <option value="año_egreso" {{$tipo_filtrado=="año_egreso" ? 'selected' : '' }}>Año de egreso</option>
                            <option value="carr_profesional" {{$tipo_filtrado=="carr_profesional" ? 'selected' : '' }}>Carrera profesional</option>
                            <option value="created_at" {{$tipo_filtrado=="created_at" ? 'selected' : '' }}>Fecha de creación</option>
                            <option value="updated_at" {{$tipo_filtrado=="updated_at" ? 'selected' : '' }}>Fecha de modificación</option>
                            </select>
                    </div>

                    {{--  Ordenar por ascendente o descendente --}}
                    <div class="col-sm-3 my-2">
                            <select name="orden" class="form-control"  id="orden" required>
                            <option selected disabled value="">Seleccione orden</option>
                            <option value="asc" {{$orden=="asc" ? 'selected' : '' }}>Ascendente</option>
                            <option value="desc" {{$orden=="desc" ? 'selected' : '' }}>Descendente</option>
                            </select>
                    </div>
                    <div class="col-sm-3 my-2">
                        <input type="submit" class="btn btn-dark"  value="Mostrar">
                    </div>
                    </div>
                </form>
            </div>
        </div>




        {{--  Crear nuevo egresado  --}}
        <div class="row" >
            <div class="col-xl-12" >
                <button type="button" class="btn btn-primary" id="open" data-bs-toggle="modal" data-bs-target="#modal-create">
                    <i class="fas fa-user"> Nuevo Egresado</i>
                </button>
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
                                <th >Código</th>
                                <th>Egresado</th>
                                <th>Carrera</th>
                                <th class="col-md-6">Apellidos y nombres</th>
                                <th class="col-md-3">Ciclo de ingreso</th>
                                <th class="col-md-3">Ciclo de egreso</th>
                                <th>Celular</th>
                                <th>DNI</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--  Permite mostrar un mensaje de no hay resultados si no se encuentra lo buscado  --}}

                            @if (count($egresados)<=0)
                                <tr class="text-center">
                                    <td colspan="9">No hay resultados</td>
                                </tr>
                            @else
                                @foreach ($egresados as $egresado)
                            <tr class="text-center">
                                <td>{{$egresado->matricula}}</td>
                                <td>
                                    <li class="nav-link ">
                                    <img src="{{asset($egresado->url)}}"
                                    class="brand-image img-circle elevation-4"
                                    style="opacity:.8" width="40">
                                    </li>
                                </td>

                                <td>{{$egresado->carr_profesional}}</td>
                                <td class="text-capitalize">{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</td>
                                <td>{{$egresado->año_ingreso}}-{{$egresado->semestre_ingreso}}</td>
                                <td>{{$egresado->año_egreso}}-{{$egresado->semestre_egreso}}</td>
                                <td>{{$egresado->celular}}</td>
                                <td>{{$egresado->dni}}</td>

                                <td>
                                {{--  Ver lista completa de datos de egresado  --}}
                                <form action="{{route('academico-profesional.index')}}" method="GET">
                                <button type="submit" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
                                <i class="fa fa-eye " aria-hidden="true"></i>
                                </button>

                                <input type="hidden" name="matricula_id" value="{{$egresado->matricula}}"
                                <input type="hidden" name="url" value="{{$egresado->matricula}}">
                                </form>

                                {{--  Crear usuario de egresado automaticamente.  --}}
                                @if ($egresado->habilitado=='0')
                                <form action="{{route('usuario.store')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm my-1" data-bs-toggle="modal" data-bs-target="#modal">
                                <i class="fas fa-user-plus"></i>
                                </button>
                                <input type="hidden" name="name" value="{{$egresado->nombres}}">
                                <input type="hidden" name="email" value="{{$egresado->matricula.'@untels.edu.pe'}}">
                                <input type="hidden" name="dni" value="{{$egresado->dni}}">
                                <input type="hidden" name="egresado_matricula" value="{{$egresado->matricula}}">
                                <input type="hidden" name="regresar" value="1">

                                </form>
                                @endif

                                </td>

                                <td>
                                {{--  Editar egresado --}}
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$egresado->matricula}}">
                                <i class="fas fa-edit"></i>
                                </button>
                                {{--  Eliminar egresado --}}
                                <button type="button" class="btn btn-danger btn-sm my-1" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$egresado->matricula}}">
                                <i class="fas fa-trash-alt"></i>
                                </button>
                                </td>




                            </tr>
                            {{-- Estos includes permite activar la vista de los modales. Poner aquí los include. --}}
                            @include('admin.egresado.egresado_create')
                            @include('admin.egresado.egresado_edit')
                            @include('admin.egresado.egresado_delete')


                            @endforeach
                            @endif

                        </tbody>
                    </table>

                    {{--  Permite mostrar los egresados en paginaciones. El comando appends permite que la variable de busqueda no se pierda. Es necesario poner el nombre de la variable.  --}}
                    {{$egresados->appends(['texto'=>$texto,'tipo_filtrado'=>$tipo_filtrado,'orden'=>$orden])->links()}}

                </div>

            </div>

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
