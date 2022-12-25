@extends('layouts.egresado')
@section('title', 'Datos personales')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 ">
                <div class="table-responsive " style="margin:10px;align=center">
                    <tbody>
                        {{-- <h5 style="font-family:garamond">PERFIL DEL EGRESADO</h5>
                        <h5 style="font-family:garamond">DATOS PERSONALES</h5> --}}

                    </tbody>
                </div>
            </div>
        </div>

                @foreach ($egresados as $egresado)
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-6">
                {{-- <form action="{{route('datos-personales.update',$egresado->matricula)}}" method="POST" enctype="multipart/form-data"> --}}
                <div class="table-responsive mx-auto d-block" style="margin:10px">
                    <div class="card " >
                            <div class="card-header" {{-- style="background-color:teal" --}} >
                             <h5 style="font-family:garamond;text-align:center;">PERFIL DEL EGRESADO</h5>
                       </div>
                        <div class="card-body">
                            <table align="left"  >
                        <tbody >


                        {{-- @csrf
                        @method('PUT') --}}
                            <input type="hidden" class="form-control" id="matricula" name="matricula"
                             value="{{$egresado->matricula}}">
                            <tr>

                                @if ($egresado->url == NULL)
                                <td colspan="2">
                                    <img src="{{asset('images/user_egresado.png')}}" alt="{{asset('images/user_egresado.png')}}" style="width:80%;max-height:400px" class="img-fluid img-thumbnail mx-auto d-block my-4 card-img-top" >
                                </td>
                                @else
                                <td colspan="2">
                                    <img src="{{asset($egresado->url)}}" alt="{{$egresado->url}}" style="width:80%;max-height:400px" class="img-fluid img-thumbnail mx-auto d-block my-4 card-img-top" >
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <td colspan="2" align="center">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-datos-personales-foto-edit-{{$egresado->matricula}}">
                                        Cambiar foto
                                    </button>
                                </td>
                            </tr>

                            <tr colspan="2" class="bg-gray-light"  >
                                <th style="padding-left:50px;padding-bottom: 5px;">NOMBRES</th>
                                <td >{{$egresado->ap_paterno}} {{$egresado->ap_materno}}
                                     {{$egresado->nombres}}</td>
                            </tr>

                            <tr>
                                <th style="padding-left:50px;padding-bottom: 5px;">DNI</th>
                                <td>{{$egresado->dni}}</td>
                            </tr>
                            <tr class="bg-gray-light" >
                                <th style="padding-left:50px;padding-bottom: 5px;">CELULAR</th>
                                <td>{{$egresado->celular}}</td>
                            </tr>
                            <tr >
                                <th style="padding-left:50px;padding-bottom: 5px;">FECHA DE NACIMIENTO</th>
                                <td>{{$egresado->fecha_nacimiento}}</td>
                            </tr>
                            <tr class="bg-gray-light" >
                                <th style="padding-left:50px;padding-bottom: 5px;">GÉNERO</th>
                                <td>{{$egresado->genero}} </td>
                            </tr>

                            <tr>
                                <th style="padding-left:50px;padding-bottom: 5px;">CORREO INSTITUCIONAL</th>
                                <td>{{$egresado->email}} </td>
                            </tr>
                            <tr>
                                <th style="padding-left:50px;padding-bottom: 5px;">CORREO PERSONAL</th>
                                <td>{{$egresado->email_personal}} </td>
                            </tr>
                            <tr class="bg-gray-light">
                                <th style="padding-left:50px;padding-bottom: 5px;">LINKEDIN</th>
                                <td>{{$egresado->linkedin}} </td>
                            </tr>

                            <tr>
                                <th style="padding-left:50px;padding-bottom: 5px;">CICLO DE INGRESO</th>
                                <td >{{$egresado->año_ingreso}}-{{$egresado->semestre_ingreso}}
                                     </td>
                            </tr>

                            <tr class="bg-gray-light">
                                <th style="padding-left:50px;padding-bottom: 5px;">CICLO DE EGRESO</th>
                                <td>{{$egresado->año_egreso}}-{{$egresado->semestre_egreso}}</td>
                            </tr>
                            <tr  >
                                <th style="padding-left:50px;padding-bottom: 5px;">PAÍS DE ORIGEN</th>
                                <td>{{$egresado->pais_origen}}</td>
                            </tr>
                            <tr class="bg-gray-light">
                                <th style="padding-left:50px;padding-bottom: 5px;">DEPARTAMENTO DE ORIGEN</th>
                                <td>{{$egresado->departamento_origen}}</td>
                            </tr>
                            <tr  >
                                <th style="padding-left:50px;padding-bottom: 5px;">PÁÍS DE RESIDENCIA</th>
                                <td>{{$egresado->pais_residencia}} </td>
                            </tr>

                            <tr class="bg-gray-light">
                                <th style="padding-left:50px;padding-bottom: 5px;">CIUDAD DE RESIDENCIA</th>
                                <td>{{$egresado->ciudad_residencia}} </td>
                            </tr>
                            <tr >
                                <th style="padding-left:50px;padding-bottom: 5px;">LUGAR DE RESIDENCIA</th>
                                <td>{{$egresado->ciudad_residencia}} </td>
                            </tr>


                            <tr class="text-lg-center">
                                <td  colspan="2" style="padding-left:50px;padding-bottom: 5px;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary  my-3 "
                                style='width:200px; height:40px;

                                ;border-radius: 10px;
                                ;-moz-border-radius: 10px;
                                ;-webkit-border-radius: 10px;
                                ;margin:10px'
                                data-bs-toggle="modal" data-bs-target="#modal-datos-personales-edit-{{$egresado->matricula}}">
                                Editar
                                </button>
                                </td>
                            </tr>

                            <input type="hidden" class="form-control" id="matricula" name="matricula"
                             value="{{$egresado->matricula}}">
                            @include('users.modalEgresados.datos_personales.datos_personales_edit')

                        @endforeach

                    </div>
                </div>
                </div>
                @include('users.modalEgresados.datos_personales.datos_personales_foto_edit')


            </div>
                    </tbody>
                </table>
                {{-- </form> --}}

    </div>
</div>
</div>
</div>
</div>
@endsection

