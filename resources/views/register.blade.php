@extends('layout.index')

@section('content')
@section('navbar') @show
<div class="container-fluid w-100 vh-100 row align-items-center m-0 bg-sm-login">
    <div class="row h-75">
        <div class="col-sm-12 col-md-10 col-lg-8 align-items-center m-auto shadow-lg bg-light">
            <div class="row h-100">
                <div class="col-lg-6 col-sm-12 p-md-5 p-3">
                        <h1 class="text-center">Registrar Nueva Cuenta</h1>
                        <hr class="text-info">
                        <div class="row align-items-center">
                            <form method="post" action="{{ route('register') }}" class="border-sm p-lg-5 p-sm-3 h-sm-100">
                            @csrf
                                <div class="form-group">
                                    <label class="text-center w-100 mb-lg-3">Nombre</label>
                                    <input class="form-control"  name="name" value="{{ old('name') }}">
                                    {!! $errors->first('name', '<small class="text-danger" >:message</small>') !!}
                                </div>

                                <div class="form-group">
                                    <label class="text-center w-100 mb-lg-3">Apellidos</label>
                                    <input class="form-control"  name="lastname" value="{{ old('lastname') }}">
                                    {!! $errors->first('lastname', '<small class="text-danger" >:message</small>') !!}
                                </div>

                                <div class="form-group">
                                    <label class="text-center w-100 mb-lg-3">Nombre de Usuario</label>
                                    <input class="form-control"  name="username" value="{{ old('username') }}">
                                    {!! $errors->first('username', '<small class="text-danger" >:message</small>') !!}

                                </div>

                                <div class="form-group">
                                    <label class="text-center w-100 mb-lg-3">Correo Electronico</label>
                                    <input class="form-control"  name="email" value="{{ old('email') }}">
                                    {!! $errors->first('email', '<small class="text-danger" >:message</small>') !!}

                                </div>

                                <div class="form-group">
                                    <label class="text-center w-100 mt-lg-3">Contraseña</label>
                                    <input type="password" class="form-control" name="password"><br>
                                    {!! $errors->first('password', '<small class="text-danger" >:message</small>') !!}
                                </div>

                                <div class="form-group">
                                    <label class="text-center w-100 mt-lg-3">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" name="confirm-password"><br>
                                    {!! $errors->first('confirm-password', '<small class="text-danger" >:message</small>') !!}
                                </div>

                                <button type="submit" class="btn btn-info w-100">Registrar Ahora</button>
                            </form>
                        </div>
                </div>
                <div class="col-lg-6 bg-login" id="slogan">
                    <div class="container w-100 h-100 row align-items-center m-auto">
                        <div class="row justify-content-center">
                            <img src="{{ asset('./img/imagotipo.png')}}" alt="joduma_logotipo" class="img-login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
