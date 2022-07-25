@extends('layout.index')

@section('content')
@section('navbar') @show
<div class="container-fluid w-100 vh-100 row align-items-center m-0 bg-sm-login">
    <div class="row h-75">
        <div class="col-sm-12 col-md-10 col-lg-8 align-items-center m-auto shadow-lg bg-light">
            <div class="row h-100">
                <div class="col-lg-6 col-sm-12 p-md-5 p-3">
                        <h1 class="text-center">Iniciar Sesion</h1>
                        <hr class="text-info">
                        <div class="row align-items-center">
                            @include('alerts.info')
                            <form method="post" action="{{ route('authentication') }}" class="border-sm p-lg-5 p-sm-3 h-sm-100">
                            @csrf
                                <div class="form-group">
                                    <label class="text-center w-100 mb-lg-3">Nombre de Usuario</label>
                                    <input class="form-control"  name="username" value="{{ old('username') }}">
                                    {!! $errors->first('username', '<small class="text-danger" >:message</small>') !!}

                                </div>
                                <div class="form-group">
                                    <label class="text-center w-100 mt-lg-3">Contraseña</label>
                                    <input type="password" class="form-control" name="password"><br>
                                    {!! $errors->first('password', '<small class="text-danger" >:message</small>') !!}
                                </div>
                                <a href="{{ route('password.request') }}" class="my-3">¿Olvidaste tu contraseña?</a>

                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lc4OgkgAAAAAB_rKDq7zRMGtdjhjbkL_sF0SNiS"></div>
                                </div>

                                <button type="submit" class="btn btn-info w-100 my-3">Iniciar Sesión</button>

                                <a href="{{ route('welcome') }}" class="d-block text-end text-dark">Regresar...</a>
                            </form>
                        </div>
                </div>
                <div class="col-lg-6" id="slogan">
                    <div class="container w-100 h-100 row align-items-center m-auto">
                        <div class="row justify-content-center">
                            <img src="{{ asset('img/logo-sly.png')}}" alt="sly-log" class="img-login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
