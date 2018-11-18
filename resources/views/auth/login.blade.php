@extends('layouts.app')
@section('content')


    <form class="md-float-material form-material" method="POST" action="{{ route('login') }}" 
    aria-label="{{ __('Login') }}">           
        @csrf
        <div class="text-center">
            <img src="{{asset('/images/logo.png')}}" alt="logo.png">
        </div>
        <div class="auth-box card">
            <div class="card-block">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-center txt-primary">Iniciar Sesión</h3>
                    </div>
                </div>
                <p class="text-muted text-center p-b-5">Inicia sesión con tu cuenta regular.</p>
                <div class="form-group form-primary">
                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                    required autofocus>
                    <span class="form-bar"></span>
                    <label class="float-label">Usuario</label>
                     @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert" placeholder="Usuario">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> 
                    @endif
                </div>
                <div class="form-group form-primary">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    required > 
                    <span class="form-bar"></span>
                    <label class="float-label">Contraseña</label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert" placeholder="Contraseña">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row m-t-25 text-left">
                    <div class="col-12">
                        <div class="checkbox-fade fade-in-primary">
                            <label>

                            </label>
                        </div>
                        <div class="forgot-phone text-right float-right">
                            <a href="{{ route('password.request') }}"  class="text-right f-w-600">
                                ¿Se te olvidó tu contraseña?</a>
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-md btn-block 
                        waves-effect text-center m-b-20">INICIAR SESIÓN</button>                
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection