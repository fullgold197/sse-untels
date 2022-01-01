@extends('layouts.app')

@section('content')
<body style="background-color:#004A98">
<link rel="stylesheet" href="{{asset('css/letras.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" id="amarillo">{{ __('Restablecer contraseña') }}</div>

                <div class="card-body">
                   {{--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                       <input type="hidden" name="token" value="{{ request()->token}}">
                       <div id="azul">
                        Correo
                       </div>
                        <div class="form-group row">
                            {{--  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>  --}}

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
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
                            {{--  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>  --}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="azul">
                            Repita nueva contraseña
                        </div>
                        <div class="form-group row">
                            {{--  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repita nueva contraseña') }}</label>  --}}

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0" align="center">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary" style="background-color: #004A98;">
                                    {{ __('Restablecer contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
