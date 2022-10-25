{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}
 <!DOCTYPE html>
<html>
<head>
	<title>Recuperar contraseña</title>
</head>    
<!--  -->
    <link rel="icon" href="https://www.generalpico.gov.ar/Arbol-favico.gif" sizes="32x32" />
    <link rel="icon" href="https://www.generalpico.gov.ar/Arbol-favico.gif" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://www.generalpico.gov.ar/Arbol-favico.gif" />
    <meta name="msapplication-TileImage" content="https://www.generalpico.gov.ar/Arbol-favico.gif" />
    <!--  -->   
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
	<div class="login-wrap">        
        <div class="login-html">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="container" style="padding-bottom:2em;">
                <img class="img-fluid" src="../img/logo_horizontal.png" alt="" style="width:60%;display:block; margin:auto;">    
            </div>        
            <div class="container text-white">
                <h4 class="mb-2 pb-2">Ingrese su correo electronico</h4>
                <div class="group">                
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input class="input" id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width: 100%;color: white;display: block;border: none;padding: 15px 20px;border-radius: 25px;background: rgba(255, 255, 255, 0.1);">                
                        <div class="row mb-0" >
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-4" style="background:#1161ee;border:none;padding: 15px 20px;border-radius: 25px;width: 60%;color: #fff;display: block;">
                                    {{ __('Enviar link de reseteo') }}
                                </button>
                            </div>
                        </div> 
                    </form> 
                </div>                
            </div>
        </div>
        
    </div>
    
</body>
</html>