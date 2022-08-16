@extends('layout.index')

@section('content')
<div class="row justify-content-center mw-100">
    @if (Auth::user()->role_id == 1)
    <div class="col-6 col-sm-4 col-md-6 col-lg-3">
        <a class="nav-link" href="{{ route('home') }}">
            <div class="card text-white text-center bg-danger on-hover-expand-card">
                <div class="card-body">
                    <div>
                        <i class="bi bi-person-square text-white"></i>
                    </div>

                    <h5 class="card-title text-white fw-bold">Usuarios</h5>
                    <h6 class="card-subtitle text-white fw-bold">{{ $users->count() }}</h6>
                </div>
            </div>
        </a>
    </div>
    @endif
    <div class="col-6 col-sm-4 col-md-6 col-lg-3">
        <a class="nav-link" href="{{ route('clients.index') }}">
            <div class="card text-center bg-success on-hover-expand-card">
                <div class="card-body">
                    <div>
                        <i class="bi bi-people-fill text-white"></i>
                    </div>
                    <h5 class="card-title text-white fw-bold">Clientes</h5>
                    <h6 class="card-subtitle text-white fw-bold"> {{ $clients->count() }} </h6>
                </div>
            </div>
        </a>
    </div>
    @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
    <div class="col-6 col-sm-4 col-md-6 col-lg-3">
        <a class="nav-link" href="{{ route('providers.index') }}">
            <div class="card text-center bg-warning on-hover-expand-card">
                <div class="card-body">
                    <div>
                        <i class="bi bi-truck text-white"></i>
                    </div>
                    <h5 class="card-title text-white fw-bold">Proveedores</h5>
                    <h6 class="card-subtitle text-white fw-bold">{{ $providers->count() }}</h6>
                </div>
            </div>
        </a>
    </div>
    @endif
    <div class="col-6 col-sm-4 col-md-6 col-lg-3">
        <a class="nav-link" href="{{ route('products.index') }}">
            <div class="card text-center bg-info on-hover-expand-card">
                <div class="card-body">
                    <div>
                        <i class="bi bi-basket text-white"></i>
                    </div>
                    <h5 class="card-title text-white fw-bold">Productos</h5>
                    <h6 class="card-subtitle text-white fw-bold">{{$products->count() }}</h6>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="container-fluid mt-1">
    @include('alerts.errors')
    @include('alerts.status')

    <div class="row mt-5 d-flex justify-content-around w-100">

        @if(Auth::user()->role_id == 1)
        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 rounded-top rounded-bottom shadow-lg mb-3">
            <div class="card border-0">

                <div class="card-img text-center my-3">
                    <img src="{{ asset('img/assets/user_list.png')}}" alt="user_list" class="img-fluid w-25">
                </div>
                <div class="card-title text-center text-white bg-dark fw-bold">Usuarios</div>
                <div class="card-body mw-75 overflow-auto">
                    @foreach($users as $user)
                    <div class="row g-0 bg-light position-relative my-2 border-bottom border-5 px-3">
                        <div class="col col-md-12 d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="my-0 fs-6">{{ $user->name }}</h5>
                                <p class="text-danger fst-italic my-0">{{ $user->role->name}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="#offcanvasuser{{$user->id}}" class="streched-link btn-warning btn-sm btn d-block" data-bs-toggle="offcanvas">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasuser{{$user->id}}" aria-labelledby="offcanvasuser">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ $user->name. ' ' . $user->lastname}}
                                            <span class="d-block text-center fst-italic text-danger">
                                                <i class="bi bi-person-fill"></i>
                                                {{ $user->role->name }}
                                            </span>
                                            <span class="d-block text-start fst-italic text-secondary fs-6">
                                                Creado en: {{ $user->created_at->format('d-m-y') }}
                                            </span>
                                            <span class="d-block text-start fst-italic text-secondary fs-6">
                                                ultima actualizacion: {{ $user->updated_at->format('d-m-y') }}
                                            </span>
                                        </h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <h6 class="text-center fs-6 fw-bold border-top border-3 border-secondary">Editar Datos de Usuario</h6>
                                        <form action="{{route('users.update', $user)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-floating my-3">
                                                <input type="text" name="name" id="inputName" placeholder="Nombre(s)" value="{{ $user->name }}" class="form-control ps-4" required>
                                                <label for="inputName">Nombre(s)</label>
                                            </div>
                                            <div class="form-floating my-3">
                                                <input type="text" name="lastname" id="inputLastname" placeholder="Apellido(s)" value="{{ $user->lastname }}" class="form-control ps-4" required>
                                                <label for="inputLastname">Apellidos(s)</label>
                                            </div>

                                            <div class="form-floating my-3">
                                                <input type="text" name="username" id="inputUsername" placeholder="Nombre de usuario" value="{{ $user->username }}" class="form-control ps-4" required>
                                                <label for="inputUsername">Usuario de Acceso</label>
                                            </div>

                                            <div class="form-group text-center">
                                                <h6 class="bg-dark rounded-pill text-white text-center fw-bold">Puesto a Desempeñar</h6>
                                                <input value="1" type="radio" class="btn-check" name="role_id" id="option1-{{ $user->id }}" autocomplete="off" @if($user->role_id === 1) checked @endif>
                                                <label class="btn btn-outline-dark" for="option1-{{ $user->id }}">Admin</label>

                                                <input value="2" type="radio" class="btn-check" name="role_id" id="option2-{{ $user->id }}" autocomplete="off" @if($user->role_id === 2) checked @endif>
                                                <label class="btn btn-outline-dark" for="option2-{{ $user->id }}">Supervisor</label>

                                                <input value="3" type="radio" class="btn-check" name="role_id" id="option3-{{ $user->id }}" autocomplete="off" @if($user->role_id === 3) checked @endif>
                                                <label class="btn btn-outline-dark" for="option3-{{ $user->id }}">Vendedor</label>
                                            </div>

                                            <div class="form-floating my-3">
                                                <input type="email" name="email" id="inputEmail" placeholder="Correo electronico" value="{{ $user->email }}" class="form-control ps-4" required>
                                                <label for="inputEmail">Correo electronico</label>
                                            </div>
                                            <hr>
                                            <h6 class="bg-dark rounded-pill text-white text-center fw-bold">Cambiar Contraseña</h6>
                                            <div class="form-floating my-3">
                                                <input type="password" name="password" id="inputPassword" placeholder="Contraseña" class="form-control ps-4">
                                                <label for="inputPassword">Nueva Contraseña</label>
                                            </div>
                                            <div class="form-group my-3">
                                                <button type="submit" class="btn-dark btn-sm btn d-block m-auto"><i class="bi bi-arrow-clockwise"></i> Actualizar Datos</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('users.destroy', $user) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger d-block m-auto my-3" onclick="return confirm('seguro que deseas eliminar')">
                                                <i class="bi bi-trash3-fill"></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <a href="" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#createUser">Nuevo Usuario</a>
                    @include('users.partials.form', ['roles'=>$roles])
                </div>
            </div>
        </div>
        @endif

        <div class="col-sm-12 col-md-6 col-lg-8 col-xl-3 rounded-top rounded-bottom shadow-lg mb-3">
            <div class="card mb-3 border-0">
                <div class="card-image text-center my-3">
                    <img src="{{ asset('img/assets/user_default.png') }}" alt="user" class="img-fluid w-25">
                </div>

                <div class="text-center" overflow-x: auto>
                    <div>
                        <span class="badge badge-info w-100 bg-dark p-2 mb-2">
                            <h6 class="text-white fw-bold m-0">Información Personal</h6>
                        </span>
                        <p>
                            <span class="fw-bold text-danger">Nombre -</span>
                            {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                        </p>
                        <p>
                            <span class="fw-bold text-danger">Correo -</span>
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                    <div>
                        <span class="badge badge-info w-100 bg-dark p-2 mb-2">
                            <h6 class="text-white fw-bold m-0">Datos del usuario</h6>
                        </span>
                        <p>
                            <span class="fw-bold text-danger">Usuario -</span>
                            {{ auth()->user()->username }}
                        </p>
                        <p>
                            <span class="fw-bold text-danger">Puesto -</span>
                            {{ auth()->user()->role->name }}
                        </p>
                    </div>
                    <div>
                        <span class="badge badge-info w-100 bg-dark p-2 mb-2">
                            <h6 class="text-white fw-bold m-0">Actualizar Contraseña</h6>
                        </span>
                        <form action="{{ route('users.changepassword', auth()->user()) }}" class="p-3" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-2">
                                <label>Contraseña Actual</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group my-2">
                                <label>Nueva Contraseña</label>
                                <input type="password" class="form-control" name="newpassword" id="newpassword">
                            </div>
                            <div class="form-group my-2">
                                <label>Repetir Nueva Contraseña</label>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
                                <div class="text-danger d-none" id="passwordmessage">
                                    Las contraseñas no coinciden
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <button class="btn btn-dark btn-sm w-100">Cambiar Contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 rounded-top rounded-bottom shadow-lg">
            <div class="card mb-3 border-0 h-100">
                <div class="card-image text-center">
                    <img src="{{ asset('img/assets/corporate_default.png') }}" alt="corporate" class="img-fluid w-25">
                </div>
                <div class="container h-100">
                    <span class="badge badge-info w-100 bg-dark p-2 mb-2">
                        <h6 class="text-white fw-bold m-0">Informacion de la empresa</h6>
                    </span>

                    @foreach($stores as $store)
                    <form action="{{ route('store.update', $store) }}" method="post" class="p-3 text-center mt-4">
                        @method('PUT')
                        @csrf
                        <div class="row py-2">
                            <div class="col-sm-12 col-lg-6">
                                <label class="mb-2"> <i class="bi bi-briefcase-fill"></i> Nombre</label>
                                <input type="text" name="name" class="form-control text-center" id="nombre" placeholder="Nombre" value="{{ $store->name }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <label class="mb-2"> <i class="bi bi-building"></i> Razon Social</label>
                                <input type="text" name="business_name" class="form-control text-center" id="razon" onkeypress="return soloLetras(event)" placeholder="Razon Social" value="{{ $store->business_name }}">
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <label class="mb-2"> <i class="bi bi-geo-alt-fill"></i> Direccion</label>
                            <input name="address" type="text" id="address" class="form-control text-center" id="direccion" laceholder="Direccion de empresa" value="{{ $store->address }}">
                        </div>

                        <div class="row py-2">
                            <div class="col-sm-12 col-lg-6">
                                <label class="mb-2"> <i class="bi bi-phone"></i>Telefono</label>
                                <input type="text" name="phone" class="form-control text-center" id="phone" placeholder="Número telefonico" value="{{ $store->phone }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <label class="mb-2"> <i class="bi bi-envelope-fill"></i> Correo</label>
                                <input type="text" name="email" class="form-control text-center" id="email" placeholder="Correo electronico" value="{{ $store->email }}">
                            </div>
                        </div>
                        <hr>
                        @if(Auth::user()->role_id == 1)
                        <div class="mt-3">
                            <input type="submit" value="Guardar Cambios" class="btn btn-sm d-block w-100 btn-dark">
                        </div>
                        @endif
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(() => {
            let password = $('#newpassword');
            let confirmPassword = $('#confirmpassword');
            let passwordMessage = $('#passwordmessage');

            confirmPassword.keyup(()=>{
                if( confirmPassword.val() !== password.val() || confirmPassword.length > 3 ){
                    password.removeClass('is-valid');
                    password.addClass('is-invalid');
                    confirmPassword.removeClass('is-valid');
                    confirmPassword.addClass('is-invalid');
                    passwordMessage.removeClass('d-none');
                    return false;
                }
                password.removeClass('is-invalid');
                confirmPassword.removeClass('is-invalid');
                password.addClass('is-valid');
                confirmPassword.addClass('is-valid');
                passwordMessage.addClass('d-none');
            })
        });





    </script>
    <script>
         document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById("phone").addEventListener('keypress', (e) => {
                let key = window.event ? e.which : e.keyCode;
                if (key < 48 || key > 57) {
                    e.preventDefault();

                }

            })


        },false);


        function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }



        </script>
@endsection
