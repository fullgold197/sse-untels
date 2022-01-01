@extends('adminlte::page')

@section('title', 'qqr2')

@section('content_header')

@stop

@section('content')
    <link rel="stylesheet" href="{{asset('css/letras.css')}}">
    <div align="center">
             <div class="col-xl-6 my-2" >
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead >
                        </thead>
                        <tbody>
                            <h5>DATOS PERSONALES</h5>
                        <tr >
                                <th>NOMBRES</th>
                                <td>{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</td>
                            </tr>
                            <tr>
                                <th>GRADO ACADÉMICO</th>
                                <td>{{$egresado->grado_academico}}</td>
                            </tr>
                            <tr>
                                <th >CÓDIGO MATRICULA</th>
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
                                <th>SEMESTRE DE INGRESO</th>
                                <td>{{$egresado->semestre_ingreso}}</td>
                            </tr>
                            <tr>
                                <th>SEMESTRE DE EGRESO</th>
                                <td>{{$egresado->semestre_egreso}}</td>
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
                    <h5>TRAYECTORIA ACADÉMICA</h5>
                    <h5 align="left">MAESTRÍAS</h5>
                    <br>
                    @foreach ($egresados1 as $egresado )
                    <table class="table table-striped">
                        <thead></thead>
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
                    @endforeach
                    <br>
                    <h5 align="left">DOCTORADOS</h5>
                    <table class="table table-striped">
                        <thead></thead>
                        @foreach ($egresados2 as $egresado )
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

                        @endforeach
                    </table>

                    <h5>TRAYECTORIA PROFESIONAL</h5>
                    @foreach ($egresados3 as $egresado )
                    <table class="table table-striped">
                        <thead></thead>
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

                            {{--  <tr>
                                <th>DESCRIPCIÓN DE RESPONSABILIDADES</th>
                                <td>{{$egresado->descripcion_responsabilidades}}</td>
                            </tr>  --}}

                        </tbody>


                    </table>
                    @endforeach

                    <a href="{{route('egresado.index')}}">Regresar</a>
                    <br>

                    {{--  {{$egresados->links()}}  --}}

                </div>

            </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
