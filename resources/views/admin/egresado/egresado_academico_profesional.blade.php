@extends('adminlte::page')

@section('title', 'Academico Profesional')

@section('content_header')

@stop

@section('content')

<!-- Modal -->

  <div class="modal-dialog" >
    <div class="content" >
      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel" >DATOS PERSONALES</h5>
      </div>
      <div class="modal-body">
        @foreach ($egresados0 as $egresado)
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <img src="{{asset($egresado->url)}}" alt="{{$egresado->url}}" style="width:80%;max-height:400px" class="img-fluid img-thumbnail mx-auto d-block my-4 card-img-top" >
                        </td>
                    </tr>
                    <tr>
                        <th>NOMBRES</th>
                            <td>{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</td>
                    </tr>
                        <tr>
                            <th>GRADO ACADÉMICO</th>
                                <td>{{$egresado->grado_academico}}</td>
                            </tr>
                        <tr>
                            <th>CÓDIGO MATRICULA</th>
                            <td>{{$egresado->matricula}}</td>
                        </tr>
                        <tr>
                            <th>DNI</th>
                                <td>{{$egresado->dni}}</td>
                        </tr>
                        <tr>
                            <th>GÉNERO</th>
                            <td>{{$egresado->genero}}</td>
                        </tr>
                            <tr>
                                <th>FECHA DE NACIMIENTO</th>
                                <td>{{$egresado->fecha_nacimiento}}</td>
                            </tr>
                            <tr>
                                <th>CICLO DE INGRESO</th>
                                <td>{{$egresado->año_ingreso}}-{{$egresado->semestre_ingreso}}</td>
                            </tr>
                            <tr>
                                <th>CICLO DE EGRESO</th>
                                <td>{{$egresado->año_egreso}}-{{$egresado->semestre_egreso}}</td>
                            </tr>
                            <tr>
                                <th>CELULAR</th>
                                <td>{{$egresado->celular}}</td>
                            </tr>
                            <tr>
                                <th>PAÍS DE ORIGEN</th>
                                <td>{{$egresado->pais_origen}}</td>
                            </tr>
                            <tr>
                                <th>DEPARTAMENTO DE ORIGEN</th>
                                <td>{{$egresado->departamento_origen}}</td>
                            </tr>
                            <tr>
                                <th>PAIS DE RESIDENCIA</th>
                                <td>{{$egresado->pais_residencia}}</td>
                            </tr>
                            <tr>
                                <th>CIUDAD DE RESIDENCIA</th>
                                <td>{{$egresado->ciudad_residencia}}</td>
                            </tr>
                            <tr>
                                <th>LUGAR DE RESIDENCIA</th>
                                <td>{{$egresado->lugar_residencia}}</td>
                            </tr>
                            <tr>
                                <th>LINKEDIN</th>
                                <td>{{$egresado->linkedin}}</td>
                            </tr>
                        </tbody>

            </table>
        @endforeach
      </div>

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel" >TRAYECTORIA ACADÉMICA</h5>
      </div>

        <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel" >Maestrías</h5>
        </div>
      @foreach ($egresados1 as $egresado )
        <div class="modal-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>GRADO ACADÉMICO</th>
                        <td>{{$egresado->grado_academico}}</td>
                    </tr>

                    <tr>
                        <th>INSTITUCIÓN</th>
                        <td>{{$egresado->institución}}</td>
                    </tr>

                    <tr>
                        <th>PAÍS</th>
                        <td>{{$egresado->pais}}</th>
                    </tr>

                    <tr>
                        <th>FECHA INICIAL</th>
                        <td>{{$egresado->fecha_inicial}}</td>
                    </tr>

                    <tr>
                        <th>FECHA FINAL</th>
                        <td>{{$egresado->fecha_final}}</td>
                    </tr>


                </tbody>
            </table>
        </div>
        @endforeach

        <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel" >Doctorados</h5>
        </div>
        @foreach ($egresados2 as $egresado )
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>GRADO ACADÉMICO</th>
                            <td>{{$egresado->grado_academico}}</td>
                        </tr>

                        <tr>
                            <th>INSTITUCIÓN</th>
                            <td>{{$egresado->institución}}</td>
                        </tr>

                        <tr>
                            <th>PAÍS</th>
                            <td>{{$egresado->pais}}</th>
                        </tr>

                        <tr>
                            <th>FECHA INICIAL</th>
                                <td>{{$egresado->fecha_inicial}}</td>
                        </tr>

                        <tr>
                            <th>FECHA FINAL</th>
                            <td>{{$egresado->fecha_final}}</td>
                        </tr>

                        </tbody>
                </table>
            </div>
        @endforeach

    <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel" >TRAYECTORIA PROFESIONAL</h5>
    </div>
    @foreach ($egresados3 as $egresado )
    <div class="modal-body">
        <table class="table table-striped">

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
                </tr>
                <tr>
                    <th>SUELDO</th>
                    <td>{{$egresado->sueldo}}</td>
                </tr>

            </tbody>


        </table>

    </div>
    @endforeach
    </div>
    </div>


    <div align="center" >
        <div class="modal-header" align="center">
        <a href="{{url()->previous()}}"><button type="button" class="btn btn-danger">Regresar
        </button>
        </div>
    </div>





    <link rel="stylesheet" href="{{asset('css/letras.css')}}">

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
