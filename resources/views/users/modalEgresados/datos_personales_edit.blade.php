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
                <label for="ap_paterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" required maxlength="20"

                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('ap_paterno')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('ap_paterno')}}
                @else
                value="{{$egresado->ap_paterno}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif

            </div>
            <div class="form-group">
                <label for="ap_materno">Apellido Materno</label>
                <input type="text" class="form-control" id="ap_materno" name="ap_materno" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('ap_materno')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('ap_materno')}}
                @else
                value="{{$egresado->ap_materno}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('nombres')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('nombres')}}
                @else
                value="{{$egresado->nombres}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
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
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento"  min="1910-01-01" max="2100-12-31" name="fecha_nacimiento" required maxlength="20"
                @if($errors->any()) {{-- Si existe algun error entonces--}}
                value="{{old('fecha_nacimiento')}}">   {{-- Ojo aqui se debe cerrar el input con ">" si ingresa a la condicion --}}
                {{$errors->first('fecha_nacimiento')}}
                @else
                value="{{$egresado->fecha_nacimiento}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
                @endif
            </div>
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



          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary " value="Editar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

          </div>
        </div>
      </div>
    </div>
</form>
