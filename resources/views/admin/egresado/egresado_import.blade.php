@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

@stop

@section('content')
<body>
    <div class="container">
        <h4 class="mb-5 my-2">Importar Registros de Egresados</h4>
        <div class="row">

            @if(isset($errors) && $errors->any())
                @foreach ($errors->all() as $error)
                <div class="col-xl-4">
                <div class="alert alert-danger" role="alert">

                    {{$error}}

                </div>
                </div>
                @endforeach
            @endif

            {{--  Este mensaje se activa cuando los datos de excel han sido importados exitosamente. Esto proviene de Http/Controllers/ReporteAdminController.php  --}}
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>

            @endif


            <div class="col-xl-12">
                <form action="{{ url('admin/egresado/ImportExcel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="file"  name="file" id="" class="form-group" >
                        <br>
                        <input type="submit"  value="Importar" class="btn btn-warning ">
                    </form>
                    <div>
                        <a href="{{route('egresado.index')}}" ><button type="button" class="btn btn-secondary">Regresar</button></a>
                    </div>
            </div>

        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
</html>
