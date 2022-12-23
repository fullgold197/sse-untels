<!-- Modal -->
{{-- <form action="{{route('usuario.update', $usuario->id)}}" method="POST"> --}}
    @csrf
    {{-- @method('PUT') --}}
    <div class="modal fade" id="modal-edit-{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="matricula">Nombres</label>
                <input type="text" class="form-control" id="nombresUpdate{{$usuario->id}}" required maxlength="20" value="{{$usuario->nombres}} {{$usuario->ap_paterno}} {{$usuario->ap_materno}} " disabled>
            </div>
            <div class="form-group">
                <label for="matricula">Código de egresado</label>
                <input type="text" class="form-control" id="matriculaUpdate{{$usuario->id}}" name="matricula" required maxlength="20" value="{{$usuario->matricula}}" disabled>
            </div>
            <div class="form-group">
                <label for="name">Usuario</label>
                <input type="text" class="form-control" id="nameUpdate{{$usuario->id}}" name="name" required maxlength="20" value="{{$usuario->name}}">
                <span class="text-danger" id="nameUpdateError{{$usuario->id}}"></span>
            </div>
            <div class="form-group">
                <label for="role_as">Rol</label>
                <input type="text" class="form-control" id="role_asUpdate{{$usuario->id}}" role_as="role_as" required maxlength="20" value="Usuario" disabled>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                    <select name="estado" class="form-control" id="estadoUpdate{{$usuario->id}}" >
                        <option value="0" {{$usuario->estado=="0" ? 'selected' : '' }}>Deshabilitado</option>
                        <option value="1" {{$usuario->estado=="1" ? 'selected' : '' }}>Habilitado</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="email">Correo institucional</label>
                <input type="text" class="form-control" id="emailUpdate{{$usuario->id}}" name="email" required maxlength="50" value="{{$usuario->email}}">
                <span class="text-danger" id="emailUpdateError{{$usuario->id}}"></span>
            </div>
            <div class="form-group">
                <label for="email_personal">Correo personal</label>
                <input type="text" class="form-control" id="email_personalUpdate{{$usuario->id}}" name="email_personal" required maxlength="50" value="{{$usuario->email_personal}}">
                <span class="text-danger" id="email_personalUpdateError{{$usuario->id}}"></span>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="passwordUpdate{{$usuario->id}}" name="password" placeholder="Ingrese la contraseña solo en caso de modificarla">
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-danger" value="Editar" onclick="updateData();">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refreshData();">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
{{-- </form> --}}
<script>
    function refreshData() {
        location.reload();
    }
    function updateData() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    let idEdit = document.getElementById("resultado").value;
    var nameUpdate = $('#nameUpdate'+idEdit).val();
    var emailUpdate = $('#emailUpdate'+idEdit).val();
    var email_personalUpdate = $('#email_personalUpdate'+idEdit).val();
    var estadoUpdate = $('#estadoUpdate'+idEdit).val();
    var passwordUpdate = $('#passwordUpdate'+idEdit).val();
    var x="usuario/";
    var y=idEdit;
    var url=x+y;
        $('#nameUpdateError'+idEdit).addClass('d-none');
        $('#emailUpdateError'+idEdit).addClass('d-none');
        $('#email_personalUpdateError'+idEdit).addClass('d-none');
    $.ajax({
        type: 'PUT',
        url: url,
        data: {_token: CSRF_TOKEN,
            name: nameUpdate,
            email: emailUpdate,
            email_personal: email_personalUpdate,
            estado: estadoUpdate,
            password: passwordUpdate,
        },
        success: function (data) {
            $('#modal-edit-'+idEdit).modal('hide');
            location.reload();
        },
        error: function (data) {
            var errors = data.responseJSON;
            if($.isEmptyObject(errors) == false) {
                $.each(errors.errors,function (key, value) {
                    var ErrorID = '#'+ key +'UpdateError'+idEdit;
                    console.log(ErrorID)
                    $(ErrorID).removeClass("d-none");
                    $(ErrorID).text(value);
                }
                )
            }
        }
    });

}
</script>

