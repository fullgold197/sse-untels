<!-- Modal -->
<form action="{{route('trayectoria-profesional.update', $egresado->id_profesion)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-profesional-edit-{{$egresado->id_profesion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar profesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <div class="form-group">
                <label for="nivel_experiencia">Nivel de experiencia</label>
                <input type="text" class="form-control" id="nivel_experiencia" name="nivel_experiencia" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('nivel_experiencia')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('nivel_experiencia')}}
                @else
                value="{{$egresado->nivel_experiencia}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="area_puesto">Area</label>
                <input type="text" class="form-control" id="area_puesto" name="area_puesto" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('area_puesto')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('area_puesto')}}
                @else
                value="{{$egresado->area_puesto}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="subarea">Subarea</label>
                <input type="text" class="form-control" id="subarea" name="subarea" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('subarea')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('subarea')}}
                @else
                value="{{$egresado->subarea}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                <input type="text" class="form-control" id="pais" name="pais" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('pais')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('pais')}}
                @else
                value="{{$egresado->pais}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('fecha_inicio')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('fecha_inicio')}}
                @else
                value="{{$egresado->fecha_inicio}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="fecha_finalizacion">Fecha de finalizacion</label>
                <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('fecha_finalizacion')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('fecha_finalizacion')}}
                @else
                value="{{$egresado->fecha_finalizacion}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="descripcion_responsabilidades">descripcion de responsabilidades</label>
                <input type="text" class="form-control" id="descripcion_responsabilidades" name="descripcion_responsabilidades" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('descripcion_responsabilidades')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('descripcion_responsabilidades')}}
                @else
                value="{{$egresado->descripcion_responsabilidades}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Editar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>
