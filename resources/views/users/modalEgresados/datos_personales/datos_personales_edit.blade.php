<!-- Modal -->
<form action="{{route('datos-personales.update', $egresado->matricula)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-datos-personales-edit-{{$egresado->matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar perfil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" align="left">



            <div class="form-group">
                <label for="celular">Teléfono</label>
                <input type="text" class="form-control" id="celular" name="celular" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('celular')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('celular')}}
                @else
                value="{{$egresado->celular}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('email')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('email')}}
                @else
                value="{{$egresado->email}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="pais_origen">País de origen</label>
                <input type="text" class="form-control" id="pais_origen" name="pais_origen" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('pais_origen')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('pais_origen')}}
                @else
                value="{{$egresado->pais_origen}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="departamento_origen">Departamento de origen</label>
                <input type="text" class="form-control" id="departamento_origen" name="departamento_origen" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('departamento_origen')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('departamento_origen')}}
                @else
                value="{{$egresado->departamento_origen}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="pais_residencia">País de residencia</label>
                <input type="text" class="form-control" id="pais_residencia" name="pais_residencia" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('pais_residencia')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('pais_residencia')}}
                @else
                value="{{$egresado->pais_residencia}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="ciudad_residencia">Ciudad de residencia</label>
                <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('ciudad_residencia')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('ciudad_residencia')}}
                @else
                value="{{$egresado->ciudad_residencia}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="lugar_residencia">Lugar de residencia</label>
                <input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('lugar_residencia')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('lugar_residencia')}}
                @else
                value="{{$egresado->lugar_residencia}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="linkedin">Linkedin</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" required maxlength="100"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('linkedin')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('linkedin')}}
                @else
                value="{{$egresado->linkedin}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            




          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary " value="Editar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

          </div>
        </div>
      </div>
    </div>
</form>
