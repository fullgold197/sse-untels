<!-- Modal -->
<form action="{{route('egresado.update', $egresado->matricula)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-edit-{{$egresado->matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar usuarios</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" required maxlength="12"
                        @if($errors->any()) {{-- Si existe algun error entonces--}}
                        value="{{old('matricula')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                        {{$errors->first('matricula')}}
                        @else
                        value="{{$egresado->matricula}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ap_paterno">Apellido paterno</label>
                        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" required maxlength="20"
                        @if($errors->any())
                        value="{{old('ap_paterno')}}">
                        {{$errors->first('ap_paterno')}}
                        @else
                        value="{{$egresado->ap_paterno}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ap_materno">Apellido materno</label>
                        <input type="text" class="form-control" id="ap_materno" name="ap_materno" required maxlength="20"
                        @if($errors->any())
                        value="{{old('ap_materno')}}">
                        {{$errors->first('ap_materno')}}
                        @else
                        value="{{$egresado->ap_materno}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required maxlength="30"
                        @if($errors->any())
                        value="{{old('nombres')}}">
                        {{$errors->first('nombres')}}
                        @else
                        value="{{$egresado->nombres}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="grado_academico">Grado académico</label>
                        <input type="text" class="form-control" id="grado_academico" name="grado_academico"  maxlength="10"
                        @if($errors->any())
                        value="{{old('grado_academico')}}">
                        {{$errors->first('grado_academico')}}
                        @else
                        value="{{$egresado->grado_academico}}" disabled>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" maxlength="8"
                        @if($errors->any())
                        value="{{old('dni')}}">
                        {{$errors->first('dni')}}
                        @else
                        value="{{$egresado->dni}}">
                        @endif
                    </div>

                    <div class="form-group">
                        {{-- <input type="text" class="form-control" id="genero" name="genero" required maxlength="50" value="{{$egresado->genero}}"> --}}
                        <label for="genero">Genero</label>
                        <select name="genero" class="form-control" id="genero" >

                            <option value="Masculino" {{$egresado->genero=="Masculino" ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{$egresado->genero=="Femenino" ? 'selected' : '' }}>Femenino</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" min="1910-01-01" max="2100-12-31" name="fecha_nacimiento" required maxlength="50"
                        @if($errors->any())
                        value="{{old('fecha_nacimiento')}}">
                        {{$errors->first('fecha_nacimiento')}}
                        @else
                        value="{{$egresado->fecha_nacimiento}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="semestre_ingreso">Semestre de ingreso</label>
                        <input type="text" class="form-control" id="semestre_ingreso" name="semestre_ingreso" maxlength="9"
                        @if($errors->any())
                        value="{{old('semestre_ingreso')}}">
                        {{$errors->first('semestre_ingreso')}}
                        @else
                        value="{{$egresado->semestre_ingreso}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="semestre_egreso">Semestre de egreso</label>
                        <input type="text" class="form-control" id="semestre_egreso" name="semestre_egreso" maxlength="9"
                        @if($errors->any())
                        value="{{old('semestre_egreso')}}">
                        {{$errors->first('semestre_egreso')}}
                        @else
                        value="{{$egresado->semestre_egreso}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular"  maxlength="15"
                        @if($errors->any())
                        value="{{old('celular')}}">
                        {{$errors->first('celular')}}
                        @else
                        value="{{$egresado->celular}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="pais_origen">Pais de origen</label>
                        <input type="text" class="form-control" id="pais_origen" name="pais_origen"  maxlength="15"
                        @if($errors->any())
                        value="{{old('pais_origen')}}">
                        {{$errors->first('pais_origen')}}
                        @else
                        value="{{$egresado->pais_origen}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="departamento_origen">Departamento de origen</label>
                        <input type="text" class="form-control" id="departamento_origen" name="departamento_origen"  maxlength="15"
                        @if($errors->any())
                        value="{{old('departamento_origen')}}">
                        {{$errors->first('departamento_origen')}}
                        @else
                        value="{{$egresado->departamento_origen}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pais_residencia">País de residencia</label>
                        <input type="text" class="form-control" id="pais_residencia" name="pais_residencia"  maxlength="15"
                        @if($errors->any())
                        value="{{old('pais_residencia')}}">
                        {{$errors->first('pais_residencia')}}
                        @else
                        value="{{$egresado->pais_residencia}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ciudad_residencia">Cuidad de residencia</label>
                        <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia"  maxlength="15"
                        @if($errors->any())
                        value="{{old('ciudad_residencia')}}">
                        {{$errors->first('ciudad_residencia')}}
                        @else
                        value="{{$egresado->ciudad_residencia}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lugar_residencia">lugar de residencia</label>
                        <input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia"  maxlength="15"
                        @if($errors->any())
                        value="{{old('lugar_residencia')}}">
                        {{$errors->first('lugar_residencia')}}
                        @else
                        value="{{$egresado->lugar_residencia}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"  maxlength="15"
                        @if($errors->any())
                        value="{{old('linkedin')}}">
                        {{$errors->first('linkedin')}}
                        @else
                        value="{{$egresado->linkedin}}">
                        @endif
                    </div>
                    <div class="form-group">
                        {{-- <input type="text" class="form-control" id="genero" name="genero" required maxlength="50" value="{{$egresado->genero}}"> --}}
                        <label for="id_academico">Carrera</label>
                        <select name="id_academico" class="form-control" id="id_academico">

                            <option value="1" {{$egresado->id_academico=="1" ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                            <option value="2" {{$egresado->id_academico=="2" ? 'selected' : '' }}>Ingeniería Electrónica y Telecomunicaciones</option>
                            <option value="3" {{$egresado->id_academico=="3" ? 'selected' : '' }}>Ingeniería Ambiental</option>
                            <option value="4" {{$egresado->id_academico=="4" ? 'selected' : '' }}>Ingeniería Mecánica y Eléctrica</option>
                            <option value="5" {{$egresado->id_academico=="5" ? 'selected' : '' }}>Administración de Empresas</option>
                          </select>

                    </div>

          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-danger " value="Editar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    </div>
</form>
