<!-- Modal -->
<form action="{{route('usuario.update', $usuario->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-edit-{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar usuarios</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="form-group">
                <label for="matricula">Nombres</label>
                <input type="text" class="form-control" id="" name="" required maxlength="20" value="{{$usuario->nombres}} {{$usuario->ap_paterno}} {{$usuario->ap_materno}} " disabled>
            </div>

            <div class="form-group">
                <label for="matricula">Código de egresado</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required maxlength="20" value="{{$usuario->matricula}}" disabled>
            </div>
            <div class="form-group">
                <label for="name">Usuario</label>
                <input type="text" class="form-control" id="name" name="name" required maxlength="20"
                @if($errors->any())
                value="{{old('name')}}">
                {{$errors->first('name')}}
                @else
                value="{{$usuario->name}}">
                @endif
            </div>

            <div class="form-group">
                <label for="role_as">Rol</label>
                    <select name="role_as" class="form-control" id="role_as" >
                        <option value="0" {{$usuario->role_as=="0" ? 'selected' : '' }}>Usuario</option>
                        <option value="1" {{$usuario->role_as=="1" ? 'selected' : '' }}>Administrador</option>
                    </select>
            </div>
            {{--  <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" required maxlength="20"
                @if($errors->any())
                value="{{old('id')}}">
                {{$errors->first('id')}}
                @else
                value="{{$usuario->id}}">
                @endif
            </div>  --}}

            <div class="form-group">
                <label for="email">Correo electronico</label>
                <input type="text" class="form-control" id="email" name="email" required maxlength="50"
                @if($errors->any())
                value="{{old('email')}}">
                {{$errors->first('email')}}
                @else
                value="{{$usuario->email}}">
                @endif
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña solo en caso de modificarla">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-danger" value="Editar">
          </div>
        </div>
      </div>
    </div>
</form>
