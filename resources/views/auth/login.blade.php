<!DOCTYPE html>
<html>
<head>
	<title>Campus Virtual - Municipalidad de General Pico</title>
    <!--  -->
    <link rel="icon" href="https://www.generalpico.gov.ar/Arbol-favico.gif" sizes="32x32" />
    <link rel="icon" href="https://www.generalpico.gov.ar/Arbol-favico.gif" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://www.generalpico.gov.ar/Arbol-favico.gif" />
    <meta name="msapplication-TileImage" content="https://www.generalpico.gov.ar/Arbol-favico.gif" />
    <!--  -->     
</head>    
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<body>
	<div class="login-wrap">        
        <div class="login-html">
            <div class="container" style="padding-bottom:2em;">
                <img class="img-fluid" src="img/logo_horizontal.png" alt="" style="width:60%;display:block; margin:auto;">    
            </div>        
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="email" class="label">Correo Electronico</label>
                            <input class="input" id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="group">
                            <label for="password" class="label">Contraseña</label>
                            <input id="password" type="password" class="input" data-type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="group">
                            <input type="checkbox" class="form-check" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>                     
                            <label for="check"> Recordar usuario</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="{{ __('Ingresar') }}">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu Password?') }}
                            </a>
                        @endif					
                    </div>
                </form>
            </div>            
            <div class="sign-up-htm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf                
                    <div class="group">
                            <label for="name" class="label">Nombre de Usuario</label>
                            <input id="user" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="group">
                            <label for="email" class="label">Correo Electronico</label>
                            <input id="email" type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>  
                    <div class="group">
                            <label for="password" class="label">Contraseña</label>
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" data-type="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="group">
                            <label for="password-confirm" class="label">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password" data-type="password">
                    </div>				
                    <div class="group">
                            <input type="submit" class="button" value="{{ __('Registrarse') }}">
                    </div>                        
                </form>
            </div>
        </div>
    </div>    
</body>
</html>