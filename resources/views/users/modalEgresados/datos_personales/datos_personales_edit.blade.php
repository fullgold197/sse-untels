<!-- Modal -->
@csrf
<div class="modal fade" id="modal-datos-personales-edit-{{$egresado->matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" align="left">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="number" class="form-control" id="celularUpdate{{$egresado->matricula}}" name="celular" maxlength="9" value="{{$egresado->celular}}">
                            <span class="text-danger" id="celularUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="correoUpdate{{$egresado->matricula}}" name="email" maxlength="20" value="{{$egresado->email}}">
                            <span class="text-danger" id="emailUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pais_origen">País de origen</label>
                            <input type="text" class="form-control" id="paisUpdate{{$egresado->matricula}}" name="pais_origen" maxlength="50" value="{{$egresado->pais_origen}}">
                            <span class="text-danger" id="pais_origenUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="departamento_origen">Departamento de origen</label>
                            <input type="text" class="form-control" id="departamento_origenUpdate{{$egresado->matricula}}" name="departamento_origen" maxlength="50"
                            value="{{$egresado->departamento_origen}}">
                            <span class="text-danger" id="departamento_origenUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pais_residencia">País de residencia</label>
                            <input type="text" class="form-control" id="pais_residenciaUpdate{{$egresado->matricula}}" name="pais_residencia" maxlength="50"
                            value="{{$egresado->pais_residencia}}">
                            <span class="text-danger" id="pais_residenciaUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ciudad_residencia">Ciudad de residencia</label>
                            <input type="text" class="form-control" id="ciudad_residenciaUpdate{{$egresado->matricula}}" name="ciudad_residencia" maxlength="50"
                            value="{{$egresado->ciudad_residencia}}">
                            <span class="text-danger" id="ciudad_residenciaUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lugar_residencia">Lugar de residencia</label>
                            <input type="text" class="form-control" id="lugar_residenciaUpdate{{$egresado->matricula}}" name="lugar_residencia" maxlength="50"
                            value="{{$egresado->lugar_residencia}}">
                            <span class="text-danger" id="lugar_residenciaUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" id="linkedinUpdate{{$egresado->matricula}}" name="linkedin" maxlength="50" value="{{$egresado->linkedin}}">
                            <span class="text-danger" id="linkedinUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input name="" type="hidden" id="resultado" value="{{$egresado->matricula}}">
        <input type="submit" class="btn btn-primary" onclick="updateData();" value="Editar">
        <button type="reset" class="btn btn-secondary" onclick="refreshData();" data-bs-dismiss="modal">Cancelar</button>

      </div>
    </div>
  </div>
</div>
{{--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
<script>
    function refreshData() {
        location.reload();
    }
    function updateData() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    let idEdit = document.getElementById("resultado").value;
    var emailUpdate = $('#correoUpdate'+idEdit).val();
    var celularUpdate = $('#celularUpdate'+idEdit).val();
    var paisUpdate = $('#paisUpdate'+idEdit).val();
    var departamento_origenUpdate = $('#departamento_origenUpdate'+idEdit).val();
    var pais_residenciaUpdate = $('#pais_residenciaUpdate'+idEdit).val();
    var ciudad_residenciaUpdate = $('#ciudad_residenciaUpdate'+idEdit).val();
    var lugar_residenciaUpdate = $('#lugar_residenciaUpdate'+idEdit).val();
    var linkedinUpdate = $('#linkedinUpdate'+idEdit).val();;
    var x="datos-personales/";
    var y=idEdit;

    var url=x+y;

        $('#emailUpdateError'+idEdit).addClass('d-none');
        $('#celularUpdateError'+idEdit).addClass('d-none');
        $('#pais_origenUpdateError'+idEdit).addClass('d-none');
        $('#departamento_origenUpdateError'+idEdit).addClass('d-none');
        $('#pais_residenciaUpdateError'+idEdit).addClass('d-none');
        $('#ciudad_residenciaUpdateError'+idEdit).addClass('d-none');
        $('#lugar_residenciaUpdateError'+idEdit).addClass('d-none');
        $('#linkedinUpdateError'+idEdit).addClass('d-none');

    $.ajax({
        type: 'PUT',
        url: url,
        data: {_token: CSRF_TOKEN,
            email: emailUpdate,
            celular:celularUpdate,
            pais_origen:paisUpdate,
            departamento_origen:departamento_origenUpdate,
            pais_residencia:pais_residenciaUpdate,
            ciudad_residencia:ciudad_residenciaUpdate,
            lugar_residencia:lugar_residenciaUpdate,
            linkedin:linkedinUpdate,
        },
        success: function (data) {
            $('#modal-datos-personales-edit-'+idEdit).modal('hide');
            $(".modal-body input").val("");
            location.reload();

        },
        error: function (data) {
            var errors = data.responseJSON;
            if($.isEmptyObject(errors) == false) {
                $.each(errors.errors,function (key, value) {
                    var ErrorID = '#' + key +'UpdateError'+idEdit;
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

