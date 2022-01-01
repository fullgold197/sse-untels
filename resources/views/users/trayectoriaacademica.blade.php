
@extends('layouts.egresado')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-xl-12 my-2">
                <div class="table-responsive" >

                    <div class="card-body">

                    <table>

                    <tbody>
                        <div  align="right">
                            <button  type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-academico-create">
                            <i class="fa fa-plus-circle" aria-hidden="true">Agregar estudio</i>
                            </button>
                        </div>
                        <tr >
                            <th >

                            </th>
                        </tr>

                        <tr>
                            <th>
                                <h5>PERFIL DE EGRESADO</h5>
                            </th>
                        </tr>
                        @foreach ($egresados0 as $egresado)
                        <tr>
                        <th>CARRERA PROFESIONAL</th>
                        <td>{{$egresado->carr_profesional}}</td>
                        </tr>

                        <tr>
                        <th>GRADO ACADÉMICO</th>
                        <td>{{$egresado->grado_academico}}</td>
                        </tr>

                        <tr>
                        <th>FECHA DE INGRESO</th>
                        <td>{{$egresado->semestre_ingreso}}</td>
                        </tr>

                        <tr>
                        <th>FECHA DE EGRESO</th>
                        <td>{{$egresado->semestre_egreso}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                    </div>

                    <form action="{{route('trayectoria-academica.index')}}" method="post" enctype="multipart/form-data">


                            <h5>Trayectoria Académica</h5>
                            <h5>Maestrías</h5>
                            @foreach ($egresados as $egresado)
                            <div class="card">
                                <div class="card-body">
                                <table>
                                <tbody>
                                <tr>
                                    <th>CARRERA PROFESIONAL</th>
                                    <td colspan="">{{$egresado->carr_profesional}}</td>
                                </tr>

                                <tr>
                                    <th>GRADO ACADÉMICO</th>
                                    <td>{{$egresado->maestria_grado_academico}}</td>
                                </tr>

                                <tr>
                                    <th>INSTITUCIÓN</th>

                                    <td>{{$egresado->maestria_institución}}</td>
                                </tr>

                                <tr>
                                    <th>PAÍS</th>

                                    <td>{{$egresado->maestria_pais}}</th>
                                </tr>

                                <tr>
                                    <th>FECHA INICIAL</th>
                                    <td>{{$egresado->maestria_fecha_inicial}}</td>
                                </tr>

                                <tr>
                                    <th>FECHA FINAL</th>
                                    <td>{{$egresado->maestria_fecha_final}}</td>

                                </tr>
                                </tbody>
                                </table>
                                <div align="right">
                                    <button  type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$egresado->id_maestria}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$egresado->id_maestria}}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                                </div>
                            </div>



                            @include('users.modalEgresados.academico_maestria_delete')
                            @include('users.modalEgresados.academico_edit')


                        @endforeach


                         <br>
                         <br>


                        <h5>Doctorados</h5>
                        @foreach ($egresados1 as $egresado)
                            <div class="card">
                                <div class="card-body">
                            <table>
                            <tbody>
                            <tr>
                                <th>CARRERA PROFESIONAL</th>
                                <td>{{$egresado->carr_profesional}}</td>
                            </tr>

                            <tr>
                                <th>GRADO ACADÉMICO</th>
                                <td>{{$egresado->doctorado_grado_academico}}</td>
                            </tr>

                            <tr>
                                <th>INSTITUCIÓN</th>
                                <td>{{$egresado->doctorado_institución}}</td>
                            </tr>

                            <tr>
                                <th>PAÍS</th>
                                <td>{{$egresado->doctorado_pais}}</td>
                            </tr>

                            <tr>
                                <th>FECHA INICIAL</th>
                                <td>{{$egresado->doctorado_fecha_inicial}}</td>
                            </tr>

                            <tr>
                                <th>FECHA FINAL</th>
                                <td>{{$egresado->doctorado_fecha_final}}</td>

                            </tr>
                            <tr>
                                <td colspan="2" align="right">

                                </td>
                            </tr>



                            @include('users.modalEgresados.academico_doctorado_edit')
                            @include('users.modalEgresados.academico_doctorado_delete')
                            </tbody>
                        </table>
                        <div align="right">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-doctorado-edit-{{$egresado->id_doctorado}}">
                                    <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-doctorado-delete-{{$egresado->id_doctorado}}">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                        </div>

                        </div>
                        </div>
                        @endforeach




                        {{--  {{$egresado->id_academico}}  --}}
                        {{--  <input type="hidden" value="{{$egresado->id_academico}}" name="id_academico" />  --}}
                        @include('users.modalEgresados.academico_create')

                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
