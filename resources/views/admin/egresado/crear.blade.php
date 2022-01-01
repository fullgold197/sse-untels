 {{-- Con este condicional abrimos el modal si hay un error de validacion en el backend --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
</head>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><!-- jquery "debe ir primero"-->--}}
{{--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 --}}
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 --}}{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

    <style>
        .error{
        color:red;
        font-style: italic;

        };
    </style>

</head>

<body>

<!-- Modal -->
<form action="{{url('/admin/egresado')}}" name="crear" id="crear" method="post">
    @csrf
    <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Crear nueva lista de egresado</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula')}}"  maxlength="10" >
                        {{$errors->first('matricula')}}
                    </div>
                    <div class="form-group">
                        <label for="ap_paterno">Apellido paterno</label>
                        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="{{ old('ap_paterno')}}" required maxlength="20" >
                        {{$errors->first('ap_paterno')}}
                    </div>
                    <div class="form-group">
                        <label for="ap_materno">Apellido materno</label>
                        <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="{{ old('ap_materno')}}" required maxlength="20" >
                        {{$errors->first('ap_materno')}}
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres')}}" required maxlength="30" >
                        {{$errors->first('nombres')}}
                    </div>

                    <div class="form-group">
                        <label for="id_academico">Carrera</label>
                        <select name="id_academico" class="form-control"  id="id_academico" required>
                            <option selected disabled value="">Seleccione carrera</option>
                                <option value="1">Ingeniería de Sistemas</option>
                                <option value="2">Ingeniería Electrónica y Telecomunicaciones</option>
                                <option value="3">Ingeniería Ambiental</option>
                                <option value="4">Ingeniería Mecánica y Eléctrica</option>
                                <option value="5">Administración de Empresas</option>

                          </select>
                    </div>{{--    --}}

                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select name="genero" class="form-control"  id="genero" required>
                            <option selected disabled value="">Seleccione genero</option>
                            <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni')}}"   maxlength="9">
                        {{$errors->first('dni')}}
                    </div>



                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" min="1910-01-01" max="2100-12-31" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento')}}" required  >
                        {{$errors->first('fecha_nacimiento')}}
                    </div>

                    <div class="form-group">
                        <label for="semestre_ingreso">Semestre de ingreso</label>
                        <input type="text" class="form-control" id="semestre_ingreso" name="semestre_ingreso" value="{{ old('semestre_ingreso')}}"   maxlength="9">
                        {{$errors->first('semestre_ingreso')}}
                    </div>

                    <div class="form-group">
                        <label for="semestre_egreso">Semestre de egreso</label>
                        <input type="text" class="form-control" id="semestre_egreso" name="semestre_egreso" value="{{ old('semestre_egreso')}}"   maxlength="9">
                        {{$errors->first('semestre_egreso')}}
                    </div>

                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular')}}"   maxlength="9">
                        {{$errors->first('celular')}}
                    </div>

                    <div class="form-group">
                        <label for="pais_origen">Pais de origen</label>
                        <input type="text" class="form-control" id="pais_origen" name="pais_origen" value="{{ old('pais_origen')}}"   maxlength="9">
                        {{$errors->first('pais_origen')}}
                    </div>

                    <div class="form-group">
                        <label for="departamento_origen">Departamento de origen</label>
                        <input type="text" class="form-control" id="departamento_origen" name="departamento_origen" value="{{ old('departamento_origen')}}"   maxlength="20">
                        {{$errors->first('departamento_origen')}}
                    </div>

                    <div class="form-group">
                        <label for="pais_residencia">País de residencia</label>
                        <input type="text" class="form-control" id="pais_residencia" name="pais_residencia" value="{{ old('pais_residencia')}}"   maxlength="20">
                        {{$errors->first('pais_residencia')}}
                    </div>

                    <div class="form-group">
                        <label for="ciudad_residencia">Ciudad de residencia</label>
                        <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" value="{{ old('ciudad_residencia')}}"   maxlength="20">
                        {{$errors->first('ciudad_residencia')}}
                    </div>

                    <div class="form-group">
                        <label for="lugar_residencia">Lugar de residencia</label>
                        <input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia" value="{{ old('lugar_residencia')}}"   maxlength="20">
                        {{$errors->first('lugar_residencia')}}
                    </div>

                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin')}}"  maxlength="20">
                        {{$errors->first('linkedin')}}
                    </div>

                    
                    <div class="form-group">
                        <button  class="btn btn-primary" id="ajaxSubmit" value="Guardar">Guardar</button>
                        <button type="reset" class="btn btn-primary" value="Cancelar">Cancelar</button>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>

            </div>
          </div>
        </div>
      </div>
    </div>

</form>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 --}}@if(count($errors)>0)

      <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/admin/egresado') }}",
                  method: 'post',
                  data: {
                     matricula: jQuery('#matricula').val(),
                     ap_paterno: jQuery('#ap_paterno').val(),
                     ap_materno: jQuery('#ap_materno').val(),
                     nombres: jQuery('#nombres').val(),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		jQuery('.alert-danger').hide();
                  		$('#open').hide();
                  		$('#modal-create').modal('hide');
                  	}
                  }});
               });
            });
      </script>
@endif

{{-- $("#crear").validate({



            rules:{

                matricula:{
                    required:true,
                },
            },

            messages:{
                matricula:"El campo es requerido",


            },



      }); --}}





</body>
</html>



