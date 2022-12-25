@extends('adminlte::page')

@section('title', 'Usuarios egresados')

@section('content_header')

@stop

@section('content')

    <body>
    <div class="container">
        <h4>Gestion de Usuarios</h4>
        <div class="row">
            <div class="col-xl-12">
                <!--El método method="GET" get permite buscar las personas solicitadas-->
                <form action="{{route('usuario.index')}}" method="GET">

                    <div class="form-row">
                        <div class="col-sm-4 my-2">
                            <input type="text" class="form-control" name="texto" placeholder="Buscar"  value="{{$texto}}">
                        </div>
                        <div class="col-sm-8 my-2">
                            <input type="submit" class="btn btn-dark"  value="Buscar">
                        </div>
                    </div>

                </form>


            </div>


            <div class="col-xl-12 my-2">
                <div class="table-responsive ">
                    <table class="table table-striped" >
                        <thead>

                            <tr class="text-center">
                                <th>N°</th>
                                <th>Carrera</th>
                                <th>Codigo</th>
                                <th>Usuario</th>
                                <th>Correo institucional</th>
                                <th>Correo personal</th>
                                <th>Nivel de acceso</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php($n=0)

                            @if (count($usuarios)<=0)
                                <tr class="text-center">
                                    <td colspan="8">No hay resultados</td>
                                </tr>
                            @else
                                @foreach ($usuarios as $usuario)

                            <tr class="text-center">
                                <td>{{++$n}}</td>
                                <td>{{$usuario->carr_profesional}}</td>
                                <td>{{$usuario->matricula}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
<<<<<<< HEAD
                                <td>{{$usuario->email_personal}}</td>
=======
>>>>>>> parent of 87369f1 (Separacion de vistas y mejora de superadmin)
                                @if ($usuario->role_as==1)
                                <td>Administrador</td>
                                @else
                                <td>Usuario</td>
                                @endif
                                 @if ($usuario->estado==1)
                                <td>Habilitado</td>
                                @else
                                <td>Deshabilitado</td>
                                @endif




                                <td>
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$usuario->id}}" data-id="{{$usuario->id}}" id="editIdBtn">
                                <i class="fas fa-edit"></i>
                                </button>



                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$usuario->id}}">
                                <i class="fas fa-trash-alt"></i>
                                </button>


                            </td>


                            </tr>

                            @include('admin.usuarios.egresados.delete')
                            @include('admin.usuarios.egresados.edit')



                            @endforeach
                            {{-- Para el id editar --}}
                            <input name="" type="hidden" id="resultado" value="">
                            @endif


                        </tbody>
                    </table>
                    @include('admin.usuarios.egresados.create')
                    {{$usuarios->appends(['texto'=>$texto])}}

                </div>

            </div>

        </div>

    </div>

</body>

</html>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).on('click','#editIdBtn', function(){
                var editIdBtn = $(this).data('id');
                document.getElementById('resultado').value = editIdBtn;
                console.log(editIdBtn);
            });

    </script>
@stop


