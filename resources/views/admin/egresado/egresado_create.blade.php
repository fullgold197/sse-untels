
<!-- Modal -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> --}}



<!-- Modal -->
{{-- <form action="{{url('/admin/egresado')}}" name="crear" id="crear" method="post">
 --}}

    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-create">Agregar nuevo egresado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @csrf
           {{--   El old('') permite rescatar los valores en caso hay algún error a la hora de validar. Esto va en value="{{old('nombre_del_campo')}}"  --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Matricula</label>
                                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula')}}"  maxlength="10" >
                                <span class="text-danger" id="matriculaError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ap_paterno">Apellido paterno</label>
                                <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="{{ old('ap_paterno')}}" required maxlength="20" >
                                <span class="text-danger" id="ap_paternoError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ap_materno">Apellido materno</label>
                                <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="{{ old('ap_materno')}}" required maxlength="20" >
                                <span class="text-danger" id="ap_maternoError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres')}}" required maxlength="30" >
                                <span class="text-danger" id="nombresError"></span>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_academico">Carrera</label>
                                <select name="id_academico" class="form-control"  id="id_academico" required>
                                    <option selected disabled value="">Seleccione carrera</option>
                                        <option value="1" {{ old('id_academico') == 1 ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                                        <option value="2" {{ old('id_academico') == 2 ? 'selected' : '' }}>Ingeniería Electrónica y Telecomunicaciones</option>
                                        <option value="3" {{ old('id_academico') == 3 ? 'selected' : '' }}>Ingeniería Ambiental</option>
                                        <option value="4" {{ old('id_academico') == 4 ? 'selected' : '' }}>Ingeniería Mecánica y Eléctrica</option>
                                        <option value="5" {{ old('id_academico') == 5 ? 'selected' : '' }}>Administración de Empresas</option>
                                </select>
                                <span class="text-danger" id="id_academicoError"></span>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select name="genero" class="form-control"  id="genero" required>
                                    <option selected disabled value="">Seleccione genero</option>
                                    <option value="Masculino" {{ old('genero') == "Masculino" ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenino" {{ old('genero') == "Femenino" ? 'selected' : '' }}>Femenino</option>
                                </select>
                                <span class="text-danger" id="generoError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni')}}" maxlength="8">
                                <span class="text-danger" id="dniError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" min="1910-01-01" max="2100-12-31" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento')}}" required>
                                <span class="text-danger" id="fecha_nacimientoError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="año_ingreso">Año de ingreso</label>
                                <input type="text" id="año_ingreso" name="año_ingreso" class="form-control" min="2000" max="2099" step="1" value="{{old('año_ingreso')}}" maxlength="4"/>
                                <span class="text-danger" id="año_ingresoError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="semestre_ingreso">Semestre de ingreso</label>
                                <select name="semestre_ingreso" class="form-control" id="semestre_ingreso" required>
                                    <option selected disabled value="">Seleccione semestre de ingreso</option>
                                    <option value="1" {{ old('semestre_ingreso') == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('semestre_ingreso') == 2 ? 'selected' : '' }}>2</option>
                                </select>
                                <span class="text-danger" id="semestre_ingresoError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="año_egreso">Año de egreso</label>
                                <input type="text" name="año_egreso"  class="form-control" min="2000" max="2099" step="1" value="{{old('año_egreso')}}" maxlength="4"/>
                                <span class="text-danger" id="año_egresoError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="semestre_egreso">Semestre de egreso</label>
                                <select name="semestre_egreso" class="form-control" id="semestre_egreso" required>
                                    <option selected disabled value="">Seleccione semestre de egreso</option>
                                    <option value="1" {{ old('semestre_egreso') == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('semestre_egreso') == 2 ? 'selected' : '' }}>2</option>
                                </select>
                                <span class="text-danger" id="semestre_egresoError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular')}}" maxlength="9">
                                <span class="text-danger" id="celularError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_origen">Pais de origen</label>
                                <input type="text" class="form-control" id="pais_origen" name="pais_origen" value="{{ old('pais_origen')}}"   maxlength="50">
                                <span class="text-danger" id="pais_origenError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_origen">Departamento de origen</label>
                                <input type="text" class="form-control" id="departamento_origen" name="departamento_origen" value="{{ old('departamento_origen')}}"   maxlength="50">
                                <span class="text-danger" id="departamento_origenError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_residencia">País de residencia</label>
                                <input type="text" class="form-control" id="pais_residencia" name="pais_residencia" value="{{ old('pais_residencia')}}"   maxlength="50">
                                <span class="text-danger" id="pais_residenciaError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ciudad_residencia">Ciudad de residencia</label>
                                <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" value="{{ old('ciudad_residencia')}}"   maxlength="50">
                                <span class="text-danger" id="ciudad_residenciaError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lugar_residencia">Lugar de residencia</label>
                                <input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia" value="{{ old('lugar_residencia')}}"  maxlength="50">
                                <span class="text-danger" id="lugar_residenciaError"></span>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" onclick="storeData();">Guardar</button>
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refreshData();">Cerrar</button>
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
        var matricula = $('#matricula').val();
        var ap_paterno = $('#ap_paterno').val();
        var ap_materno = $('#ap_materno').val();
        var nombres = $('#nombres').val();
        var grado_academico = $('#grado_academico').val();
        var dni = $('#dni').val();
        var genero = $('#genero').val();
        var fecha_nacimiento = $('#fecha_nacimiento').val();
        var año_ingreso = $('#año_ingreso').val();
        var semestre_ingreso = $('#semestre_ingreso').val();
        var año_egreso = $('#año_egreso').val();
        var semestre_egreso = $('#semestre_egreso').val();
        var celular = $('#celular').val();
        var pais_origen = $('#pais_origen').val();
        var departamento_origen = $('#departamento_origen').val();
        var pais_residencia = $('#pais_residencia').val();
        var ciudad_residencia = $('#ciudad_residencia').val();
        var lugar_residencia = $('#lugar_residencia').val();
        var id_academico = $('#id_academico').val();

            $('#matriculaError').addClass('d-none');
            $('#ap_paternoError').addClass('d-none');
            $('#ap_maternoError').addClass('d-none');
            $('#nombresError').addClass('d-none');
            $('#grado_academicoError').addClass('d-none');
            $('#dniError').addClass('d-none');
            $('#generoError').addClass('d-none');
            $('#fecha_nacimientoError').addClass('d-none');
            $('#año_ingresoError').addClass('d-none');
            $('#semestre_ingresoError').addClass('d-none');
            $('#año_egresoError').addClass('d-none');
            $('#semestre_egresoError').addClass('d-none');
            $('#año_egresoError').addClass('d-none');
            $('#celularError').addClass('d-none');
            $('#pais_origenError').addClass('d-none');
            $('#departamento_origenError').addClass('d-none');
            $('#pais_residenciaError').addClass('d-none');
            $('#ciudad_residenciaError').addClass('d-none');
            $('#lugar_residenciaError').addClass('d-none');
            $('#id_academicoError').addClass('d-none');

        $.ajax({
            type: 'POST',
            url: "{{route('egresado.store')}}",
            data: {_token: CSRF_TOKEN,
                matricula: matricula,
                ap_paterno: ap_paterno,
                ap_materno: ap_materno,
                nombres: nombres,
                grado_academico: grado_academico,
                dni: dni,
                genero: genero,
                fecha_nacimiento: fecha_nacimiento,
                año_ingreso: año_ingreso,
                semestre_ingreso: semestre_ingreso,
                año_egreso: año_egreso,
                semestre_egreso: semestre_egreso,
                celular:celular,
                pais_origen:pais_origen,
                departamento_origen:departamento_origen,
                pais_residencia:pais_residencia,
                ciudad_residencia:ciudad_residencia,
                lugar_residencia:lugar_residencia,
                id_academico:id_academico,
            },
            success: function (data) {
                $('#modal-create').modal('hide');
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
