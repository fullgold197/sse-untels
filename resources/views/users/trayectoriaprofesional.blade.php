@extends('layouts.egresado')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 my-2">
                <div class="table-responsive" >
                    <form action="{{route('trayectoria-profesional.index')}}" method="POST" enctype="multipart/form-data">
                            <div align="right">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-profesional-create">
                                <i class="fa fa-plus-circle" aria-hidden="true">Agregar trabajo</i>
                                </button>
                            </div>
                            <h5>
                                PERFIL DEL EGRESADO
                            </h5>
                            <h5>Trayectoria profesional</h5>
                            @foreach ($egresados as $egresado)
                            <div class="card">
                            <div class="card-body">

                            <table>
                            <tbody>
                            <tr>
                                <th>EMPRESA</th>
                                <td>{{$egresado->empresa}}</td>
                            </tr>

                            <tr>
                                <th>ACTIVIDAD DE LA EMPRESA</th>
                                <td>{{$egresado->actividad_empresa}}</td>
                            </tr>

                            <tr>
                                <th>PUESTO</th>
                                <td>{{$egresado->puesto}}</td>
                            </tr>

                            <tr>
                                <th>NIVEL DE EXPERIENCIA</th>
                                <td>{{$egresado->nivel_experiencia}}</td>
                            </tr>

                            <tr>
                                <th>ÁREA DE PUESTO</th>
                                <td>{{$egresado->area_puesto}}</td>
                            </tr>

                            <tr>
                                <th>SUBAREA</th>
                                <td>{{$egresado->subarea}}</td>
                            </tr>

                            <tr>
                                <th>PAÍS</th>
                                <td>{{$egresado->pais}}</td>
                            </tr>

                            <tr>
                                <th>FECHA DE INICIO</th>
                                <td>{{$egresado->fecha_inicio}}</td>
                            </tr>

                            <tr>
                                <th>FECHA DE FINALIZACIÓN</th>
                                <td>{{$egresado->fecha_finalizacion}}</td>
                            </tr>

                            <tr>
                                <th>DESCRIPCIÓN DE RESPONSABILIDADES</th>
                                <td>{{$egresado->descripcion_responsabilidades}}</td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                           {{--   <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-profesional-edit-{{$egresado->id_profesion}}">
                                <i class="fas fa-edit"></i>
                            </button>  --}}
                            @include('users.modalEgresados.profesional_edit')
                            @include('users.modalEgresados.profesional.profesion_edit')
                            @include('users.modalEgresados.profesional.profesional_delete')
                            </tbody>
                        </table>
                        <div align="right">
                            <button  type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-profesion-edit-{{$egresado->id_profesion}}">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-profesional-delete-{{$egresado->id_profesion}}">
                            <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                            </div>
                        </div>
                        @endforeach
                        @include('users.modalEgresados.profesional.profesional_create')


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


