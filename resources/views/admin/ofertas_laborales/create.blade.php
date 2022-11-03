  <!-- Modal -->
  <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Oferta Laboral</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="matricula">Imagen</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula')}}"  maxlength="10" >
            </div>
            <div class="form-group">
                <label for="matricula">Nombre de la empresa</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula')}}"  maxlength="10" >
            </div>
            <div class="form-group">
                <label for="matricula">Dirección URL</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula')}}"  maxlength="10" >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
