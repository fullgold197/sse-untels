@extends('layouts.auth')
@section('content')
<title>SSE-Untels</title>
<div class="container">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-4" style="margin:70px;align=center">
            <div class="card">
                <div class="card-header">
                    <div id="" align="center">
                        <i class="fas fa-user-graduate" id="azul"></i></i>
                        <h5 id="azul">SISTEMA DE SEGUIMIENTO DE EGRESADOS UNTELS</h5>
                    </div>
                    <div id="amarillo" align="center">
                        Iniciar Sesión
                    </div>

                    <div id="azul" class="text-center">
                        Por favor, ingrese los datos solicitados
                    </div>
                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Codigo--}}
                        <div id="azul">
                            Usuario
                        </div>
                        <div class="form-group row">
                            {{-- <label for="egresado_matricula" class="col-md-4 col-form-label text-md-right">{{
                                __('Codigo') }}</label> --}}
                            <div class="col-md-12">
                                <input id="egresado_matricula" type="egresado_matricula"
                                    class="form-control @error('egresado_matricula') is-invalid @enderror"
                                    name="egresado_matricula" value="{{ old('egresado_matricula') }}" required
                                    autocomplete="egresado_matricula" autofocus>

                                @error('egresado_matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div id="azul">
                            Contraseña
                        </div>
                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña')
                                }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0 " align="center">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn3 btn-primary2 full-width2"
                                    style="background-color: #004A98;margin-top:5px;margin-left:-50px">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                            </div>
                        </div>

                        <div id="" align="center">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" id="azul">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                    <div class="bgDark" style="margin: 0px; padding-bottom:0px;">
                        <div class="container" style="margin: 0px; padding-top:20px; padding-bottom:0px;">

                            <ul class="list-inline2" style="margin: 0px;">
                                <li class="list-inline-item ">
                                    <a href="https://www.facebook.com/untelsperu" style="margin: 0px;"
                                        target="_blank "><img src="{{asset('images/facebook2.svg')}}"
                                            class="img-fluid"></a>
                                </li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <li class="list-inline-item ">
                                    <a href="https://www.instagram.com/untelsoficial" style="margin: 0px;"
                                        target="_blank "><img src="images/instagram.svg" class="img-fluid"></a>
                                </li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <li class="list-inline-item ">
                                    <a href="https://www.youtube.com/c/UniversidadNacionalTecnológicadeLimaSur"
                                        style="margin: 0px;" target=" _blank "><img src="images/yt.svg"
                                            class=" img-fluid"></a>
                                </li>
                            </ul>
                            {{-- <small>©2022 Todos los derechos reservados por O & C Inversiones Decor Floor
                                S.A.C</small>
                            --}}
                        </div>
                    </div>

                </div>
                <div class="card-body" id="" align="center">
                    @if (\Session::has('bloqueo'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('bloqueo') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>

            </div>

            {{-- <div id="espacio" align="center">
                <div id="col-md-10">
                    <a target="_blank" href="https://www.facebook.com/untelsperu">
                        <img src="{{asset('images/facebook.png')}}" class="img-fluid" width="40px"
                            alt="facebook untelss">
                    </a>
                    <a target="_blank" href="https://www.instagram.com/untelsoficial">
                        <img src="{{asset('images/instagram.png')}}" class="img-fluid" width="40px"
                            alt="instagram untels">
                    </a>
                    <a target="_blank" href="https://www.youtube.com/c/UniversidadNacionalTecnológicadeLimaSur">
                        <img src="{{asset('images/youtube.png')}}" class="img-fluid" width="40px" alt="youtube untels">
                    </a>

                </div>
            </div>--}}




        </div>
    </div>

    @endsection