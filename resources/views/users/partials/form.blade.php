<div class="modal fade rounded" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-6 fw-bold text-center bg-dark rounded p-2 text-white" id="createUserLabel">Usuario Nuevo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body border-top border-2 border-dark">
                <form action="{{ route('users.store') }}" method="post" class="">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="form-floating">
                                <input
                                    required
                                    type="text"
                                    class="form-control ps-4"
                                    name="name"
                                    id="nameInput"
                                    placeholder="Nombre(s)">
                                <label for="nameInput">Nombre(s)</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="form-floating">
                                <input
                                required
                                type="text"
                                class="form-control ps-4"
                                name="lastname"
                                id="lastNameInput"
                                placeholder="Apellido(s)">
                                <label for="lastNameInput">Apellido(s)</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            required
                            type="text"
                            class="form-control ps-4"
                            name="username"
                            id="usernameInput"
                            placeholder="JuanSupervisor">
                        <label>Nombre de Usuario</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select required class="form-control ps-4" name="role_id" id="roleInput">
                            <option value="" selected disabled>--Selecciona--</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label for="roleInput">Puesto a desempeñar</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            required
                            type="email"
                            class="form-control ps-4"
                            name="email"
                            id="emailInput"
                            placeholder="correo@ejemplo.com">
                        <label for="emailInput">Correo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            required
                            type="password"
                            class="form-control ps-4"
                            name="password"
                            id="passwordInput"
                            placeholder="Contraseña">
                        <label for="passwordInput">Contraseña</label>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group">
                            <button class="btn btn-dark btn-md">
                                <i class="bi bi-person-plus-fill"></i>
                                Crear Nuevo
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
