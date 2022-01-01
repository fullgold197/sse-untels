<!-- Modal -->
<form action="{{route('doctorado.update', $egresado->id_doctorado)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-doctorado-edit-{{$egresado->id_doctorado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" align="left">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar doctorado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="doctorado_grado_academico">Grado Academico</label>
                <input type="text" class="form-control" id="doctorado_grado_academico" name="doctorado_grado_academico" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('doctorado_grado_academico')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('doctorado_grado_academico')}}
                @else
                value="{{$egresado->doctorado_grado_academico}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="doctorado_pais">País</label>
                <input type="text" class="form-control" id="doctorado_pais" name="doctorado_pais" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('doctorado_pais')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('doctorado_pais')}}
                @else
                value="{{$egresado->doctorado_pais}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="doctorado_institución">Institución</label>
                <input type="text" class="form-control" id="doctorado_institución" name="doctorado_institución" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('doctorado_institución')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('doctorado_institución')}}
                @else
                value="{{$egresado->doctorado_institución}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="doctorado_fecha_inicial">Fecha inicial</label>
                <input type="date" class="form-control" id="doctorado_fecha_inicial" name="doctorado_fecha_inicial" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('doctorado_fecha_inicial')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('doctorado_fecha_inicial')}}
                @else
                value="{{$egresado->doctorado_fecha_inicial}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="doctorado_fecha_final">Fecha final</label>
                <input type="date" class="form-control" id="doctorado_fecha_final" name="doctorado_fecha_final" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('doctorado_fecha_final')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('doctorado_fecha_final')}}
                @else
                value="{{$egresado->doctorado_fecha_final}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
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
