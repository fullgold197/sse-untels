<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table{
        width: 97%;
        border-collapse: collapse;
        border: #ACABAB 1px solid;
        font-size: 13px;
        margin: auto;
        }
        table thead {
            color: white;
            background-color: #6B6B6B;
        }
        tr, td {
        height: 48px;
        border: #ACABAB 1px solid;
        text-align:center;
        }
        tr:nth-child(even){
        color: #6B6B6B;
        background-color: #D8D8D8;
        }
        tbody tr:nth-child(odd){
        color: #6B6B6B;
        background-color: #FFFFFF;
        }
</style>
<body>
    <h3 align = "center">Reporte egresados</h3>
<table class="table table-striped" >
    <thead>

        <tr class="text-center">
            <th width="50px">Número</th>
            <th width = "100px">Codigo Matricula</th>
        {{--      <th>Carrera</th>  --}}
            <th>Nombres</th>
            <th>Semestre de ingreso</th>
            <th>Semestre de egreso</th>
            <th>Celular</th>
        </tr>
    </thead>
    <tbody>
        @if (count($egresados)<=0)
            <tr class="text-center">
                <td colspan="8">No hay resultados</td>
            </tr>
        @else
       @php
           $i=1;
       @endphp
            @foreach ($egresados as $egresado)
        <tr class="text-center">
            <td>@php
                echo $i;
            @endphp</td>
            <td>{{$egresado->matricula}}</td>
            {{--  <td>{{$egresado->carrera}}</td>  --}}

            <td class="text-capitalize">{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</td>

            <td>{{$egresado->semestre_ingreso}}</td>
            <td>{{$egresado->semestre_egreso}}</td>
            <td>{{$egresado->celular}}</td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
        @endif

    </tbody>
</table>
</body>
</html>
