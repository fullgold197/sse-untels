<!-- Modal -->
<form action="{{route('imagen.update', $egresado->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-datos-personales-foto-edit-{{$egresado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar foto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" align="left">
            <div class="form-group">
                <label for="file"> Seleccione Imagen: </label><br>
                    <input type="file" name="file" id="file" accept="image/*"
                    @if($errors->any())
                    value="{{old('file')}}">
                    @else
                    value="{{$egresado->url}}"> {{--Si no ingresa a la condicion tambien debe cerrarse el input con ">" --}}
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
