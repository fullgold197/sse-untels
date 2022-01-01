<!-- Modal -->
<form action="{{route('maestria.destroy', $egresado->id_maestria)}}" method="POST">
    @csrf
    @method('DELETE')

    <div class="modal fade" id="modal-delete-{{$egresado->id_maestria}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminación de registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Deseas eliminar el sig. registro?
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-danger " value="Eliminar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    </div>
</form>
