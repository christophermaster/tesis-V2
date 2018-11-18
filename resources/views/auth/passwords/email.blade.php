@extends('layouts.app') 
@section('content')

    <form class="md-float-material form-material">
        <div class="text-center">
            <img src="{{asset('images/logo.png')}}" alt="logo.png">
        </div>
        <div class="auth-box card">
            <div class="card-block">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-left">Recupera tu contraseña</h3>
                    </div>
                </div>
                
                <div class="form-group form-primary">
                    <input type="text" name="email-address" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Tu Correo Electronico</label>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset Password</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <p class="text-inverse text-left m-b-0">Gracias.</p>
                        <p class="text-inverse text-left"><a href="index.html"><b>Se le enviará un correo electronico </b></a></p>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('images/auth/Logo-small-bottom.png')}}" alt="small-logo.png">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection