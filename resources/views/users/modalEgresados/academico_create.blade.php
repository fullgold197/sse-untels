<!-- Modal -->
<form action="{{route('trayectoria-academica.store')}}" method="POST">
    @csrf
    <div class="modal fade" id="modal-academico-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" align="left">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo estudio</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                        <label for="grado_academico">Grado academico</label>
                        <select name="grado_academico" class="form-control"  id="grado_academico" required>
                            <option selected disabled value="">Seleccione grado académico</option>
                            <option value="Maestro">Maestro</option>
                                <option value="Doctor">Doctor</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="pais">País</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="" required maxlength="50" >

                    </div>

                    <div class="form-group">
                        <label for="institución">Institucion</label>
                        <input type="text" class="form-control" id="institución" name="institución" required maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicial">Fecha de inicio</label>
                        <input type="date" min="1910-01-01" max="2100-12-31" class="form-control" id="fecha_inicial" name="fecha_inicial" required maxlength="20" >
                    </div>
                    <div class="form-group">
                        <label for="fecha_final">Fecha de finalización</label>
                        <input type="date" min="1910-01-01" max="2100-12-31" class="form-control" id="fecha_final" name="fecha_final" required maxlength="20" >
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                       {{--   <input type="hidden" value="{{$egresado->id_academico}}" name="id_academico">  --}}

    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
          </div>
        </div>
      </div>
    </div>
</form>
