<!-- Modal -->
<form action="{{route('egresado.update', $egresado->matricula)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-edit-{{$egresado->matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar egresado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" required maxlength="10"
                        @if($errors->any()) {{-- Si existe algun error entonces--}}
                        value="{{old('matricula')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                        <div class="text-danger">
                        {{$errors->first('matricula')}}
                        </div>
                        @else
                        value="{{$egresado->matricula}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ap_paterno">Apellido paterno</label>
                        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" required maxlength="20"
                        @if($errors->any())
                        value="{{old('ap_paterno')}}">
                        <div class="text-danger">
                        {{$errors->first('ap_paterno')}}
                        </div>
                        @else
                        value="{{$egresado->ap_paterno}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ap_materno">Apellido materno</label>
                        <input type="text" class="form-control" id="ap_materno" name="ap_materno" required maxlength="20"
                        @if($errors->any())
                        value="{{old('ap_materno')}}">
                        <div class="text-danger">
                        {{$errors->first('ap_materno')}}
                        </div>
                        @else
                        value="{{$egresado->ap_materno}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required maxlength="30"
                        @if($errors->any())
                        value="{{old('nombres')}}">
                        <div class="text-danger">
                        {{$errors->first('nombres')}}
                        </div>
                        @else
                        value="{{$egresado->nombres}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="grado_academico">Grado académico</label>
                        <input type="text" class="form-control" id="grado_academico" name="grado_academico"  maxlength="10"
                        @if($errors->any())
                        value="{{old('grado_academico')}}">
                        <div class="text-danger">
                        {{$errors->first('grado_academico')}}
                        </div>
                        @else
                        value="{{$egresado->grado_academico}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" maxlength="8"
                        @if($errors->any())
                        value="{{old('dni')}}">
                        <div class="text-danger">
                        {{$errors->first('dni')}}
                        </div>
                        @else
                        value="{{$egresado->dni}}">
                        @endif
                    </div>

                    <div class="form-group">
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
                        <div class="text-danger">
                        {{$errors->first('fecha_nacimiento')}}
                        </div>
                        @else
                        value="{{$egresado->fecha_nacimiento}}">
                        @endif
                    </div>

                    <div>
                        <div>
                            <label for="semestre_ingreso">Ciclo de ingreso</label>
                        </div>
                        <div class="form-group">
                            <div id="color_plomo">Año de ingreso</div>
                            <input type="number"  name="año_ingreso" maxlength="4" class="form-control" min="1900" max="2099" step="1"
                            @if($errors->any())
                            value="{{old('año_ingreso')}}">
                            <div class="text-danger">
                            {{$errors->first('año_ingreso')}}
                            </div>
                            @else
                            value="{{$egresado->año_ingreso}}">
                            @endif

                        </div>
                        <div class="form-group">
                            <div id="color_plomo">Semestre de ingreso</div>
                            <select name="semestre_ingreso" class="form-control" id="semestre_ingreso" >
                            <option value="1" {{$egresado->semestre_ingreso=="1" ? 'selected' : '' }}>1</option>
                            <option value="2" {{$egresado->semestre_ingreso=="2" ? 'selected' : '' }}>2</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div >
                            <label for="semestre_ingreso">Ciclo de egreso</label>
                        </div>

                        <div class="form-group">
                            <div id="color_plomo">Año de egreso</div>
                            <input type="number" name="año_egreso"  maxlength="4" class="form-control" min="1900" max="2099" step="1"
                            @if($errors->any())
                            value="{{old('año_egreso')}}">
                            <div class="text-danger">
                            {{$errors->first('año_egreso')}}
                            </div>
                            @else
                            value="{{$egresado->año_egreso}}">
                            @endif

                        </div>
                        <div class="form-group">
                            <div id="color_plomo">Semestre de egreso</div>
                            <select name="semestre_egreso" class="form-control" id="semestre_egreso" >
                            <option value="1" {{$egresado->semestre_egreso=="1" ? 'selected' : '' }}>1</option>
                            <option value="2" {{$egresado->semestre_egreso=="2" ? 'selected' : '' }}>2</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular"  maxlength="9"
                        @if($errors->any())
                        value="{{old('celular')}}">
                        <div class="text-danger">
                        {{$errors->first('celular')}}
                        </div>
                        @else
                        value="{{$egresado->celular}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="pais_origen">Pais de origen</label>
                        <input type="text" class="form-control" id="pais_origen" name="pais_origen"  maxlength="50"
                        @if($errors->any())
                        value="{{old('pais_origen')}}">
                        <div class="text-danger">
                        {{$errors->first('pais_origen')}}
                        </div>
                        @else
                        value="{{$egresado->pais_origen}}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="departamento_origen">Departamento de origen</label>
                        <input type="text" class="form-control" id="departamento_origen" name="departamento_origen"  maxlength="50"
                        @if($errors->any())
                        value="{{old('departamento_origen')}}">
                        <div class="text-danger">
                        {{$errors->first('departamento_origen')}}
                        </div>
                        @else
                        value="{{$egresado->departamento_origen}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pais_residencia">País de residencia</label>
                        <input type="text" class="form-control" id="pais_residencia" name="pais_residencia"  maxlength="50"
                        @if($errors->any())
                        value="{{old('pais_residencia')}}">
                        <div class="text-danger">
                        {{$errors->first('pais_residencia')}}
                        </div>
                        @else
                        value="{{$egresado->pais_residencia}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ciudad_residencia">Cuidad de residencia</label>
                        <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia"  maxlength="50"
                        @if($errors->any())
                        value="{{old('ciudad_residencia')}}">
                        <div class="text-danger">
                        {{$errors->first('ciudad_residencia')}}
                        </div>
                        @else
                        value="{{$egresado->ciudad_residencia}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lugar_residencia">lugar de residencia</label>
                        <input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia"  maxlength="50"
                        @if($errors->any())
                        value="{{old('lugar_residencia')}}">
                        <div class="text-danger">
                        {{$errors->first('lugar_residencia')}}
                        </div>
                        @else
                        value="{{$egresado->lugar_residencia}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"  maxlength="50"
                        @if($errors->any())
                        value="{{old('linkedin')}}">
                        <div class="text-danger">
                        {{$errors->first('linkedin')}}
                        </div>
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
            <input type="hidden" name="matricula_hidden" value="{{$egresado->matricula}}">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    </div>
</form>
