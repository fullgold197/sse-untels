<!-- Modal -->
{{-- <form action="{{route('administradores.store')}}" method="POST"> --}}
    @csrf
    <div class="modal fade" id="modal-administradores-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Usuario</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" required maxlength="20" >
                        <span class="text-danger" id="nameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" required maxlength="100">
                        <span class="text-danger" id="emailError"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required maxlength="20" >
                        <span class="text-danger" id="passwordError"></span>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control"  id="estado" required>
                            <option selected disabled value="">Seleccione estado</option>
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                          </select>
                          <span class="text-danger" id="estadoError"></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar" onclick="storeData();">
                        <input type="reset" class="btn btn-primary" value="Cancelar" onclick="refreshData();">
                    </div>
          </div>
        </div>
      </div>
    </div>
{{-- </form> --}}
<script>
    function refreshData() {
            location.reload();
        }
    function storeData() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var estado = $('#estado').val();
            $('#nameError').addClass('d-none');
            $('#emailError').addClass('d-none');
            $('#passwordError').addClass('d-none');
            $('#estadoError').addClass('d-none');

        $.ajax({
            type: 'POST',
            url: "{{route('administradores.store')}}",
            data: {_token: CSRF_TOKEN,
                name: name,
                email: email,
                password: password,
                estado: estado,

            },
            success: function (data) {
                $('#modal-administradores-create').modal('hide');
                location.reload();
            },
            error: function (data) {
                var errors = data.responseJSON;
                if($.isEmptyObject(errors) == false) {
                    $.each(errors.errors,function (key, value) {
                        var ErrorID = '#' + key +'Error';
                        $(ErrorID).removeClass("d-none");
                        $(ErrorID).text(value);
                    }
                    )
                }
            }
        });
    }
</script>
