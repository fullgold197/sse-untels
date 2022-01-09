<!-- Modal -->
<form action="{{route('egresado.destroy', $egresado->matricula)}}" method="POST">
    @csrf
    @method('DELETE')

    <div class="modal fade" id="modal-delete-{{$egresado->matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminación de registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Deseas eliminar el registro: {{$egresado->ap_paterno." ".$egresado->ap_materno." ".$egresado->nombres}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-danger" value="Eliminar">
          </div>
        </div>
      </div>
    </div>
</form>
