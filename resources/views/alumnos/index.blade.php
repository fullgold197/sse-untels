@extends('adminlte::page')

@section('title', 'Lista de alumnos')

@section('content_header')

@stop

@section('content')
@if(isset($errors) && $errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="col-xl-4">
                        <div class="alert alert-danger" role="alert">
                        {{$error}}


                        </div>
                        </div>

                        @endforeach
@endif

            <div class="col-xl-12 my-2">
                <div class="table-responsive ">
                    <table class="table table-striped" >
                        <thead>
                            <tr
                            class="text-center">
                                <th>Nombre</th>
                                <th >Apellido</th>
                                <th>Edad</th>
                                <th>Direccion</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--  Permite mostrar un mensaje de no hay resultados si no se encuentra lo buscado  --}}
                            @foreach ($alumnos as $alumno)
                            @if (count($alumno)<=0)
                                <tr class="text-center">
                                    <td colspan="9">No hay resultados</td>
                                </tr>


                                <td>{{$alumno->nombre}}</td>
                                <td>{{$alumno->apellido}}</td>
                                <td>{{$alumno->edad}}</td>
                                <td>{{$alumno->direccion}}</td>



                            </tr>
                            @endif
                            {{-- Estos includes permite activar la vista de los modales. Poner aquí los include. --}}
                            @include('alumnos.crea_alumnos')

                            @endforeach


                        </tbody>
                    </table>
