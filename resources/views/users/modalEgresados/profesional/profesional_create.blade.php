

<!-- Modal -->
<form action="{{route('trayectoria-profesional.store')}}" method="POST">
    @csrf
    <div class="modal fade" id="modal-profesional-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" align="left">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Trayectoria profesional</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ old('empresa')}}" required maxlength="50" >
                        {{$errors->first('empresa')}}
                    </div>
                    <div class="form-group">
                        <label for="actividad_empresa">Actividad de la empresa</label>
                        <input type="text" class="form-control" id="actividad_empresa" name="actividad_empresa" required maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto</label>
                        <input type="text" class="form-control" id="puesto" name="puesto" required maxlength="50" >
                    </div>

                    <div class="form-group">
                        <label for="nivel_experiencia">Nivel de experiencia</label>
                        <select name="nivel_experiencia" class="form-control"  id="nivel_experiencia" required>
                            <option selected disabled value="">Seleccione experiencia</option>
                            <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="area_puesto">Area de puesto</label>
                        <input type="text" class="form-control" id="area_puesto" name="area_puesto" required maxlength="20" >
                    </div>
                    <div class="form-group">
                        <label for="subarea">Subarea</label>
                        <input type="text" class="form-control" id="subarea" name="subarea" required maxlength="20" >
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais')}}" required maxlength="20" >
                        {{$errors->first('pais')}}
                    </div>


                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required maxlength="20">
                    </div>

                    {{--Campo fecha de finalización --}}
                    <div class="form-group">
                        <label for="fecha_finalizacion">Fecha de finalización</label>
                            <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" required maxlength="20" min="1910-01-01" max="2100-12-31"  >
                            {{-- La class="agree" permite desabilitar o habilitar la fecha de finalización. Este proviene de la función JQuery almacenada en view/layouts/egresado.blase.php --}}
                            <label>
                                <input type="checkbox" class="agree" id="fecha_finalizacion_checkbox" value="Actualmente laborando" name="fecha_finalizacion">Actualmente laborando
                            </label>
                    </div>

                    <div class="form-group">
                        <label for="descripcion_responsabilidades">Descripcion de responsabilidades</label>
                        <input type="text" class="form-control" id="descripcion_responsabilidades" name="descripcion_responsabilidades" required maxlength="50" >
                    </div>

                    <div class="form-group">
                    <label for="sueldo">Sueldo mensual</label>
                    <select name="sueldo" class="form-control" id="sueldo" required>
                            <option selected disabled value="">Seleccione sueldo</option>
                            <option value="Menos de 2000 soles">Menos de 2000 soles</option>
                            <option value="Entre 2000 y 5000 soles">Entre 2000 y 5000 soles</option>
                            <option value="Más de 5000 soles">Más de 5000 soles</option>
                            <option value="Prefiero no contestar">Prefiero no contestar</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
          </div>
        </div>
      </div>
    </div>
</form>
