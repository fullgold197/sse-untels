<!-- Modal -->
<form action="{{route('maestria.update', $egresado->id_maestria)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-edit-{{$egresado->id_maestria}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" align="left">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar maestria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="maestria_grado_academico">Grado Academico</label>
                <input type="text" class="form-control" id="maestria_grado_academico" name="maestria_grado_academico" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('maestria_grado_academico')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('maestria_grado_academico')}}
                @else
                value="{{$egresado->maestria_grado_academico}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="maestria_pais">País</label>
                <input type="text" class="form-control" id="maestria_pais" name="maestria_pais" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('maestria_pais')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('maestria_pais')}}
                @else
                value="{{$egresado->maestria_pais}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="maestria_institución">Institución</label>
                <input type="text" class="form-control" id="maestria_institución" name="maestria_institución" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('maestria_institución')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('maestria_institución')}}
                @else
                value="{{$egresado->maestria_institución}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="maestria_fecha_inicial">Fecha inicial</label>
                <input type="date" class="form-control" id="maestria_fecha_inicial" name="maestria_fecha_inicial" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('maestria_fecha_inicial')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('maestria_fecha_inicial')}}
                @else
                value="{{$egresado->maestria_fecha_inicial}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="maestria_fecha_final">Fecha final</label>
                <input type="date" class="form-control" id="maestria_fecha_final" name="maestria_fecha_final" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('maestria_fecha_final')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('maestria_fecha_final')}}
                @else
                value="{{$egresado->maestria_fecha_final}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>

          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Editar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    </div>
</form>
