@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')

    <p>Bienvenido(a) {{Auth::user()->name}} al sistema web de seguimiento de egresados. Aqui podrás monitorear a los egresados con respecto a las maestrías y doctorados que hagan, así como los empleos que hagan en el transcurso de su profesión.</p>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

