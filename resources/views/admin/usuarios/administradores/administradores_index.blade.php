@extends('adminlte::page')

@section('title', 'Usuarios administradores')

@section('content_header')

@stop

@section('content')

    <body>
    <div class="container">
        <h4>Gestion de Usuarios</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('administradores.index')}}" method="GET">

                    {{--  <div class="form-row">
                        <div class="col-sm-4 my-2">
                            <input type="text" class="form-control" placeholder="Buscar"  name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-sm-8 my-2">
                            <input type="submit" class="btn btn-dark" value="Buscar">
                        </div>
                    </div>  --}}
                    <div class="form-row">
                        <div class="col-auto my-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-administradores-create">Nuevo</button>
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
                    @endif

                </form>

            </div>

            <div class="col-xl-12 my-2">
                <div class="table-responsive ">
                    <table class="table table-striped" >
                        <thead>

                            <tr class="text-center">
                                <th>N°</th>
                                <th>Carrera</th>
                                <th>Usuario</th>
                                <th>Correo</th>
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
                                @if ($usuario->carr_profesional == NULL)
                                <td>Todas las carreras</td>
                                @else
                                <td>{{$usuario->carr_profesional}}</td>
                                @endif
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>

                                @if ($usuario->role_as==1)
                                <td>Administrador</td>
                                @elseif ($usuario->role_as==2)
                                <td>Super Administrador</td>
                                @elseif ($usuario->role_as==0)
                                @endif

                                @if ($usuario->estado==1)
                                <td>Habilitado</td>
                                @else
                                <td>Desabilitado</td>
                                @endif



                            <td>
                              <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-administradores-edit-{{$usuario->id}}" data-id="{{$usuario->id}}" id="editIdBtn">
                                <i class="fas fa-edit"></i>
                                </button>



                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-administradores-delete-{{$usuario->id}}">
                                <i class="fas fa-trash-alt"></i>
                                </button>


                            </td>


                            </tr>

                            @include('admin.usuarios.administradores.administradores_delete')
                            @include('admin.usuarios.administradores.administradores_edit')



                            @endforeach
                            {{-- Para el id editar --}}
                            <input name="" type="hidden" id="resultado" value="">
                            @endif

                        </tbody>
                    </table>
                    @include('admin.usuarios.administradores.administradores_create')
                    {{$usuarios->links()}}

                </div>

            </div>

        </div>

    </div>

</body>


@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(document).on('click','#editIdBtn', function(){
                var editIdBtn = $(this).data('id');
                document.getElementById('resultado').value = editIdBtn;
                console.log(editIdBtn);
            });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </html>
@stop


