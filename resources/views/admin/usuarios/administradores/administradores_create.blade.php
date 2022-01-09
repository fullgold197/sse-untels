<!-- Modal -->
<form action="{{route('administradores.store')}}" method="POST">
    @csrf
    <div class="modal fade" id="modal-administradores-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Usuario</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" required maxlength="20" >
                        {{$errors->first('name')}}
                    </div>
                    <div class="form-group"
                        <label for="email">Correo electronico</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" required maxlength="100">
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
                                <option value="0">Desabilitado</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-primary" value="Cancelar">

                    </div>
          </div>
        </div>
      </div>
    </div>
</form>
