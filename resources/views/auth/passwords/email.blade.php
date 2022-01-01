@extends('layouts.app')

@section('content')
<body style="background-color:#004A98">
<link rel="stylesheet" href="{{asset('css/letras.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" id="amarillo">{{ __('Reestablecer contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf
                        <div id="azul">
                            Dirección email
                        </div>
                        <div class="form-group row" id="">
                            {{--  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direccion email') }}</label>  --}}

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0" id="" align="center">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary" style="background-color: #004A98;">
                                    {{ __('Enviar link al correo') }}
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
