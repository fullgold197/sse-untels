<!-- Modal -->
<form action="{{route('trayectoria-profesional.update', $egresado->id_profesion)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-profesion-edit-{{$egresado->id_profesion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar profesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{-- Campo empresa--}}
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa" name="empresa" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('empresa')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('empresa')}}
                @else
                value="{{$egresado->empresa}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo Actividad de la empresa--}}
            <div class="form-group">
                <label for="actividad_empresa">Actividad de la empresa</label>
                <input type="text" class="form-control" id="actividad_empresa" name="actividad_empresa" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('actividad_empresa')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('actividad_empresa')}}
                @else
                value="{{$egresado->actividad_empresa}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo Puesto--}}
            <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" class="form-control" id="puesto" name="puesto" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('puesto')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('puesto')}}
                @else
                value="{{$egresado->puesto}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo Nivel de experiencia--}}
            <div class="form-group">
                <label for="nivel_experiencia">Nivel de experiencia</label>
                <select name="nivel_experiencia" class="form-control" id="nivel_experiencia" >
                <option value="Junior" {{$egresado->nivel_experiencia=="Junior" ? 'selected' : '' }}>Junior</option>
                <option value="Senior" {{$egresado->nivel_experiencia=="Senior" ? 'selected' : '' }}>Senior</option>
                </select>
            </div>

            {{-- Campo Área--}}
            <div class="form-group">
                <label for="area_puesto">Área</label>
                <input type="text" class="form-control" id="area_puesto" name="area_puesto" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('area_puesto')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('area_puesto')}}
                @else
                value="{{$egresado->area_puesto}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo Subárea--}}
            <div class="form-group">
                <label for="subarea">Subárea</label>
                <input type="text" class="form-control" id="subarea" name="subarea" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('subarea')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('subarea')}}
                @else
                value="{{$egresado->subarea}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo País--}}
            <div class="form-group">
                <label for="pais">País</label>
                <input type="text" class="form-control" id="pais" name="pais" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('pais')}}" >   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('pais')}}
                @else
                value="{{$egresado->pais}}" > {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo Fecha de inicio--}}
            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('fecha_inicio')}}" >   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('fecha_inicio')}}
                @else
                value="{{$egresado->fecha_inicio}}" > {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            {{-- Campo Fecha de finalización--}}
            <div class="form-group">
                <label for="fecha_finalizacion">Fecha de finalizacion</label>
                <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('fecha_finalizacion')}}" >   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('fecha_finalizacion')}}
                @endif

                {{--Aqui estamos diciendo que si el campo fecha finalización se llama "Actualmente laborando" se desabilita el campo respectivo, caso contrario se mantiene habilitado con su fecha respectica. La función está en views/layouts/egresado.blade.php ">" --}}
                @if ($egresado->fecha_finalizacion == "Actualmente laborando")
                value="{{$egresado->fecha_finalizacion}}" disabled>
                @else
                value="{{$egresado->fecha_finalizacion}}">
                @endif

                    {{-- La class="agree" permite desabilitar o habilitar la fecha de finalización. Este proviene de la función JQuery almacenada en view/layouts/egresado.blase.php --}}
                    <input type="checkbox" class="agree" name="fecha_finalizacion" value="Actualmente laborando" {{ $egresado->fecha_finalizacion == 'Actualmente laborando' ? 'checked' : ''}}>Actualmente laborando</option>
                    {{--  <input type="checkbox" class="agree" id="fecha_finalizacion_checkbox" value="Actualmente laborando" name="fecha_finalizacion">Actualmente laborando  --}}
                </label>

            </div>
            {{-- Campo Descripcion de responsabilidades--}}
            <div class="form-group">
                <label for="descripcion_responsabilidades">Descripcion de responsabilidades</label>
                <input type="text" class="form-control" id="descripcion_responsabilidades" name="descripcion_responsabilidades" required maxlength="50"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('descripcion_responsabilidades')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('descripcion_responsabilidades')}}
                @else
                value="{{$egresado->descripcion_responsabilidades}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            {{-- Campo Sueldo--}}
            <div class="form-group">
                <label for="sueldo">Sueldo</label>
                    <select name="sueldo" class="form-control" id="sueldo" >
                        <option value="Menos de 2000 soles" {{$egresado->sueldo=="Entre 2000 y 5000 soles" ? 'selected' : '' }}>Menos de 2000 soles</option>
                        <option value="Entre 2000 y 5000 soles" {{$egresado->sueldo=="Entre 2000 y 5000 sole" ? 'selected' : '' }}>Femenino</option>
                        <option value="Más de 5000 soles" {{$egresado->sueldo=="Más de 5000 soles" ? 'selected' : '' }}>Más de 5000 soles</option>
                        <option value="Prefiero no contestar" {{$egresado->sueldo=="Prefiero no contestar" ? 'selected' : '' }}>Prefiero no contestar</option>
                    </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>
