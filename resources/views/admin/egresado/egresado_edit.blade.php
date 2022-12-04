<!-- Modal -->
{{-- <form action="{{route('egresado.update', $egresado->matricula)}}" method="POST"> --}}
    @csrf
    {{-- @method('PUT') --}}
    <div class="modal fade" id="modal-edit-{{$egresado->matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar egresado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Matricula</label>
                                <input type="text" class="form-control" id="matriculaUpdate{{$egresado->matricula}}" name="matricula" required maxlength="10" value="{{$egresado->matricula}}">
                                <span class="text-danger" id="matriculaUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ap_paterno">Apellido paterno</label>
                                <input type="text" class="form-control" id="ap_paternoUpdate{{$egresado->matricula}}" name="ap_paterno" required maxlength="20" value="{{$egresado->ap_paterno}}">
                                <span class="text-danger" id="ap_paternoUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ap_materno">Apellido materno</label>
                                <input type="text" class="form-control" id="ap_maternoUpdate{{$egresado->matricula}}" name="ap_materno" required maxlength="20" value="{{$egresado->ap_materno}}">
                                <span class="text-danger" id="ap_maternoUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombresUpdate{{$egresado->matricula}}" name="nombres" required maxlength="30" value="{{$egresado->nombres}}">
                                <span class="text-danger" id="nombresUpdateError{{$egresado->matricula}}"></span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="grado_academico">Grado académico</label>
                                <input type="text" class="form-control" id="grado_academicoUpdate{{$egresado->matricula}}" name="grado_academico"  maxlength="10" value="{{$egresado->grado_academico}}">
                                <span class="text-danger" id="grado_academicoUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="number" class="form-control" id="dniUpdate{{$egresado->matricula}}" name="dni" maxlength="8" value="{{$egresado->dni}}">
                                <span class="text-danger" id="dniUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <input type="number" id="año_ingresoUpdate{{$egresado->matricula}}" name="año_ingreso" maxlength="4" class="form-control" min="1900" max="2099" step="1" value="{{$egresado->año_ingreso}}">
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
                                <input type="number" name="año_egreso" id="año_egresoUpdate{{$egresado->matricula}}" maxlength="4" class="form-control" min="1900" max="2099" step="1" value="{{$egresado->año_egreso}}">
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
                                <input type="number" class="form-control" id="celularUpdate{{$egresado->matricula}}" name="celular"  maxlength="9" value="{{$egresado->celular}}">
                                <span class="text-danger" id="celularUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_origen">Pais de origen</label>
                                <input type="text" class="form-control" id="pais_origenUpdate{{$egresado->matricula}}" name="pais_origen"  maxlength="50" value="{{$egresado->pais_origen}}">
                                <span class="text-danger" id="pais_origenUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_origen">Departamento de origen</label>
                                <input type="text" class="form-control" id="departamento_origenUpdate{{$egresado->matricula}}" name="departamento_origen"  maxlength="50" value="{{$egresado->departamento_origen}}">
                                <span class="text-danger" id="departamento_origenUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_residencia">País de residencia</label>
                                <input type="text" class="form-control" id="pais_residenciaUpdate{{$egresado->matricula}}" name="pais_residencia"  maxlength="50" value="{{$egresado->pais_residencia}}">
                                <span class="text-danger" id="pais_residenciaUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ciudad_residencia">Cuidad de residencia</label>
                                <input type="text" class="form-control" id="ciudad_residenciaUpdate{{$egresado->matricula}}" name="ciudad_residencia"  maxlength="50" value="{{$egresado->ciudad_residencia}}">
                                <span class="text-danger" id="ciudad_residenciaUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lugar_residencia">Lugar de residencia</label>
                                <input type="text" class="form-control" id="lugar_residenciaUpdate{{$egresado->matricula}}" name="lugar_residencia"  maxlength="50" value="{{$egresado->lugar_residencia}}">
                                <span class="text-danger" id="lugar_residenciaUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" class="form-control" id="linkedinUpdate{{$egresado->matricula}}" name="linkedin"  maxlength="50" value="{{$egresado->linkedin}}">
                                <span class="text-danger" id="linkedinUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <input type="text" class="form-control" id="genero" name="genero" required maxlength="50" value="{{$egresado->genero}}"> --}}
                                <label for="id_academico">Carrera</label>
                                <select id="id_academicoUpdate{{$egresado->matricula}}" class="form-control" name="id_academico">
                                    <option value="1" {{$egresado->id_academico=="1" ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                                    <option value="2" {{$egresado->id_academico=="2" ? 'selected' : '' }}>Ingeniería Electrónica y Telecomunicaciones</option>
                                    <option value="3" {{$egresado->id_academico=="3" ? 'selected' : '' }}>Ingeniería Ambiental</option>
                                    <option value="4" {{$egresado->id_academico=="4" ? 'selected' : '' }}>Ingeniería Mecánica y Eléctrica</option>
                                    <option value="5" {{$egresado->id_academico=="5" ? 'selected' : '' }}>Administración de Empresas</option>
                                </select>
                                <span class="text-danger" id="id_academicoUpdateError{{$egresado->matricula}}"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-danger " value="Editar" onclick="updateData();">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refreshData();" >Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        function refreshData() {
            location.reload();
        }
        function updateData() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let idEdit = document.getElementById("resultado").value;
        var matriculaUpdate = $('#matriculaUpdate'+idEdit).val();
        var ap_paternoUpdate = $('#ap_paternoUpdate'+idEdit).val();
        var ap_maternoUpdate = $('#ap_maternoUpdate'+idEdit).val();
        var nombresUpdate = $('#nombresUpdate'+idEdit).val();
        var grado_academicoUpdate = $('#grado_academicoUpdate'+idEdit).val();
        var dniUpdate = $('#dniUpdate'+idEdit).val();
        var generoUpdate = $('#generoUpdate'+idEdit).val();
        var fecha_nacimientoUpdate = $('#fecha_nacimientoUpdate'+idEdit).val();
        var año_ingresoUpdate = $('#año_ingresoUpdate'+idEdit).val();
        var semestre_ingresoUpdate = $('#semestre_ingresoUpdate'+idEdit).val();
        var año_egresoUpdate = $('#año_egresoUpdate'+idEdit).val();
        var semestre_egresoUpdate = $('#semestre_egresoUpdate'+idEdit).val();
        var celularUpdate = $('#celularUpdate'+idEdit).val();
        var pais_origenUpdate = $('#pais_origenUpdate'+idEdit).val();
        var departamento_origenUpdate = $('#departamento_origenUpdate'+idEdit).val();
        var pais_residenciaUpdate = $('#pais_residenciaUpdate'+idEdit).val();
        var ciudad_residenciaUpdate = $('#ciudad_residenciaUpdate'+idEdit).val();
        var lugar_residenciaUpdate = $('#lugar_residenciaUpdate'+idEdit).val();
        var linkedinUpdate = $('#linkedinUpdate'+idEdit).val();
        var id_academicoUpdate = $('#id_academicoUpdate'+idEdit).val();
        var x="egresado/";
        var y=idEdit;

        var url=x+y;

            $('#matriculaUpdateError'+idEdit).addClass('d-none');
            $('#ap_paternoUpdateError'+idEdit).addClass('d-none');
            $('#ap_maternoUpdateError'+idEdit).addClass('d-none');
            $('#nombresUpdateError'+idEdit).addClass('d-none');
            $('#grado_academicoUpdateError'+idEdit).addClass('d-none');
            $('#dniUpdateError'+idEdit).addClass('d-none');
            $('#generoUpdateError'+idEdit).addClass('d-none');
            $('#fecha_nacimientoUpdateError'+idEdit).addClass('d-none');
            $('#año_ingresoUpdateError'+idEdit).addClass('d-none');
            $('#semestre_ingresoUpdateError'+idEdit).addClass('d-none');
            $('#año_egresoUpdateError'+idEdit).addClass('d-none');
            $('#semestre_egresoUpdateError'+idEdit).addClass('d-none');
            $('#año_egresoUpdateError'+idEdit).addClass('d-none');
            $('#celularUpdateError'+idEdit).addClass('d-none');
            $('#pais_origenUpdateError'+idEdit).addClass('d-none');
            $('#departamento_origenUpdateError'+idEdit).addClass('d-none');
            $('#pais_residenciaUpdateError'+idEdit).addClass('d-none');
            $('#ciudad_residenciaUpdateError'+idEdit).addClass('d-none');
            $('#lugar_residenciaUpdateError'+idEdit).addClass('d-none');
            $('#linkedinUpdateError'+idEdit).addClass('d-none');
            $('#id_academicoUpdateError'+idEdit).addClass('d-none');

        $.ajax({
            type: 'PUT',
            url: url,
            data: {_token: CSRF_TOKEN,
                matricula: matriculaUpdate,
                ap_paterno: ap_paternoUpdate,
                ap_materno: ap_maternoUpdate,
                nombres: nombresUpdate,
                grado_academico: grado_academicoUpdate,
                dni: dniUpdate,
                genero: generoUpdate,
                fecha_nacimiento: fecha_nacimientoUpdate,
                año_ingreso: año_ingresoUpdate,
                semestre_ingreso: semestre_ingresoUpdate,
                año_egreso: año_egresoUpdate,
                semestre_egreso: semestre_egresoUpdate,
                celular:celularUpdate,
                pais_origen:pais_origenUpdate,
                departamento_origen:departamento_origenUpdate,
                pais_residencia:pais_residenciaUpdate,
                ciudad_residencia:ciudad_residenciaUpdate,
                lugar_residencia:lugar_residenciaUpdate,
                linkedin:linkedinUpdate,
                id_academico:id_academicoUpdate,
            },
            success: function (data) {
                $('#modal-edit-'+idEdit).modal('hide');
                $(".modal-body input").val("");
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
{{-- </form> --}}
