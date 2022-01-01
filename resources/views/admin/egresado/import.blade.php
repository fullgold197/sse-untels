@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

@stop

@section('content')
<body>
    <div class="container">
        <h4 class="mb-5 my-2">Importar Registros de Egresados</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ url('admin/egresado/ImportExcel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="file"  name="file" id="" class="form-group" >
                        <br>
                        <input type="submit"  value="Importar" class="btn btn-warning ">
                    </form>
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
