@extends('layouts.egresado')
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
                <form action="{{route('datos-personales.update',$egresado->matricula)}}" method="POST" enctype="multipart/form-data">
                <div class="table-responsive mx-auto d-block" style="margin:10px">
                    <div class="card " >



                            <div class="card-header " {{-- style="background-color:teal" --}} >
                             <h5 style="font-family:garamond;text-align:center;">PERFIL DEL EGRESADO</h5>
{{--                         <h5 style="font-family:garamond;text-align:center">DATOS PERSONALES</h5>
 --}}                          </div>
                        <div class="card-body">
                            <table align="left"  >
                        <tbody >


                        @csrf
                        @method('PUT')
                            <input type="hidden" class="form-control" id="matricula" name="matricula"
                             value="{{$egresado->matricula}}">



                            <tr>
                                <td colspan="2">
                                    <img src="{{asset($egresado->url)}}" alt="{{$egresado->url}}" style="width:80%;max-height:400px" class="img-fluid img-thumbnail mx-auto d-block my-4 card-img-top" >
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" align="center">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-datos-personales-foto-edit-{{$egresado->id}}">
                                        Cambiar foto
                                    </button>
                                </td>
                            </tr>


{{--                             <tr>
 --}}                                {{-- <td align="center" colspan="2">
                                    <div class="form-group">
                                    <label for="file"> </label>
                                        <input type="file" name="file" id="file" accept="image/*"><br>
                                        @error('file')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>
                                </td> --}}
{{--                             </tr>
 --}}                          {{--   <tr>
                                <td align="center" colspan="2">
                                    <button type="submit" class="btn btn-primary">Cambiar foto</button>
                                </td>
                            </tr> --}}

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
                            @include('users.modalEgresados.datos_personales_edit')
                            @include('users.modalEgresados.foto.datos_personales_foto_edit')
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
                    </tbody>
                </table>
                </form>
    </div>
</div>
</div>
</div>
</div>
@endsection

