@extends('layouts.egresado')
@section('title', 'Inicio')
@section('content')
<h5>Inicio</h5>
<p>Bienvenido(a) {{Auth::user()->name}} al sistema web de seguimiento de egresados. Aqui podrás registrar tus estudios postgrados con respecto a las maestrías y doctorados que hagan, así como los empleos que hagas en el transcurso de tu profesión.</p>
@endsection
