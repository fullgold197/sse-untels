<!-- Modal -->
<form action="{{route('usuario.store')}}" method="POST">
    @csrf
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" required maxlength="30" >
                        {{$errors->first('name')}}
                    </div>
                    <div class="form-group">
                        <label for="egresado_matricula">Código de egresado</label>
                        <input type="text" class="form-control" id="egresado_matricula" name="egresado_matricula" value="{{ old('egresado_matricula')}}" required maxlength="20" >
                        {{$errors->first('egresado_matricula')}}
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" required maxlength="50" >
                        {{$errors->first('email')}}
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required maxlength="20" >
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control"  id="estado" required>
                            <option selected disabled value="">Seleccione estado</option>
                                <option value="1">Habilitado</option>
                                <option value="0">Deshabilitado</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
          </div>
        </div>
      </div>
    </div>
</form>
