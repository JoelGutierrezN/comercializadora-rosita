@extends('home.layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 85vh">
            <div class="col-12 col-md-6">
                <form action="{{ route('password.update') }}" class="form p-5 rounded shadow-lg" method="POST">
                    @csrf
                    @method('POST')
                    <fieldset class="text-center fw-bold fs-5 text-white bg-terciario p-2">
                        Recuperacion de contraseña
                    </fieldset>
                    <p class="bg-terciario text-secundario text-center p-2 fw-bold">Ingresa tu correo electronico y tu nueva
                        contraseña para restaurar tu contraseña de acceso</p>

                    @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('password')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('password_confirmation')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group my-4">
                        <label class="d-block text-center form-label fw-bold" for="">Correo</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="ejemplo@correo.com" value="{{ old('email' || '') }}">
                    </div>

                    <div class="form-group my-4">
                        <label class="d-block text-center form-label fw-bold" for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>

                    <div class="form-group my-4">
                        <label class="d-block text-center form-label fw-bold" for="">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="password_confirmation" id="confirm-password"
                            placeholder="password">
                    </div>

                    <input type="submit" class="btn d-block mx-auto btn-terciario fw-bold" value="Enviar" id="btn-send">
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/validate-password.js') }}"></script>
@endsection
