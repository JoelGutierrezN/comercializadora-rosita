@extends('home.layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 85vh">
            <div class="col-12 col-md-6">
                <form action="{{ route('password.email') }}" class="form p-5 rounded shadow-lg" method="POST">
                    @csrf
                    @method('POST')
                    <fieldset class="text-center fw-bold fs-5 text-white bg-terciario p-2">
                        Recuperacion de contraseña
                    </fieldset>
                    <p class="bg-terciario text-secundario text-center p-2 fw-bold">Ingresa tu correo electronico para
                        contuniar con el proceso de recuperacion de contraseña</p>

                    @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="form-group my-4">
                        <label class="d-block text-center form-label fw-bold" for="">Correo</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="ejemplo@correo.com" value="{{ old('email' || '') }}">
                    </div>

                    <input type="submit" class="btn d-block mx-auto btn-terciario fw-bold" value="Enviar">
                </form>

            </div>
        </div>
    </div>

@endsection
