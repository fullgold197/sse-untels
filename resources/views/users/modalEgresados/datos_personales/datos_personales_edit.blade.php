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
                            <label for="genero">Genero</label>
                            <select name="genero" class="form-control" id="generoUpdate{{$egresado->matricula}}" >
                                <option value="Masculino" {{$egresado->genero=="Masculino" ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{$egresado->genero=="Femenino" ? 'selected' : '' }}>Femenino</option>
                            </select>
                            <span class="text-danger" id="generoUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimientoUpdate{{$egresado->matricula}}" min="1910-01-01" max="2100-12-31" name="fecha_nacimiento" required maxlength="50" value="{{$egresado->fecha_nacimiento}}">
                            <span class="text-danger" id="fecha_nacimientoUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="año_ingreso">Año de ingreso</label>
                                <input type="text" id="año_ingresoUpdate{{$egresado->matricula}}" name="año_ingreso" maxlength="4" class="form-control" min="1900" max="2099" step="1" value="{{$egresado->año_ingreso}}">
                                <span class="text-danger" id="año_ingresoUpdateError{{$egresado->matricula}}"></span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="semestre_ingreso">Semestre de ingreso</label>
                            <select name="semestre_ingreso" class="form-control" id="semestre_ingresoUpdate{{$egresado->matricula}}" >
                            <option value="1" {{$egresado->semestre_ingreso=="1" ? 'selected' : '' }}>1</option>
                            <option value="2" {{$egresado->semestre_ingreso=="2" ? 'selected' : '' }}>2</option>
                            </select>
                            <span class="text-danger" id="semestre_ingresoUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="año_egreso">Año de egreso</label>
                            <input type="text" name="año_egreso" id="año_egresoUpdate{{$egresado->matricula}}" maxlength="4" class="form-control" min="1900" max="2099" step="1" value="{{$egresado->año_egreso}}">
                            <span class="text-danger" id="año_egresoUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="semestre_egreso">Semestre de egreso</label>
                            <select name="semestre_egreso" class="form-control" id="semestre_egresoUpdate{{$egresado->matricula}}" >
                            <option value="1" {{$egresado->semestre_egreso=="1" ? 'selected' : '' }}>1</option>
                            <option value="2" {{$egresado->semestre_egreso=="2" ? 'selected' : '' }}>2</option>
                            </select>
                            <span class="text-danger" id="semestre_egresoUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celularUpdate{{$egresado->matricula}}" name="celular" maxlength="9" value="{{$egresado->celular}}">
                            <span class="text-danger" id="celularUpdateError{{$egresado->matricula}}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="correoUpdate{{$egresado->matricula}}" name="email" maxlength="50" value="{{$egresado->email}}">
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
                            <span class="text-danger" id="linkedinUpdateError{{$egresado->matricula}}"50>
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
    var generoUpdate = $('#generoUpdate'+idEdit).val();
    var fecha_nacimientoUpdate = $('#fecha_nacimientoUpdate'+idEdit).val();
    var año_ingresoUpdate = $('#año_ingresoUpdate'+idEdit).val();
    var semestre_ingresoUpdate = $('#semestre_ingresoUpdate'+idEdit).val();
    var año_egresoUpdate = $('#año_egresoUpdate'+idEdit).val();
    var semestre_egresoUpdate = $('#semestre_egresoUpdate'+idEdit).val();
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

    $('#generoUpdateError'+idEdit).addClass('d-none');
    $('#fecha_nacimientoUpdateError'+idEdit).addClass('d-none');
    $('#año_ingresoUpdateError'+idEdit).addClass('d-none');
    $('#semestre_ingresoUpdateError'+idEdit).addClass('d-none');
    $('#año_egresoUpdateError'+idEdit).addClass('d-none');
    $('#semestre_egresoUpdateError'+idEdit).addClass('d-none');
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
            genero: generoUpdate,
            fecha_nacimiento: fecha_nacimientoUpdate,
            año_ingreso: año_ingresoUpdate,
            semestre_ingreso: semestre_ingresoUpdate,
            año_egreso: año_egresoUpdate,
            semestre_egreso: semestre_egresoUpdate,
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

