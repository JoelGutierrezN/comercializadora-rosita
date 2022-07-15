<div class="offcanvas offcanvas-start" tabindex="-1" id="clientDetail{{ $client->id }}" aria-labelledby="clientDetailLabel">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title" id="clientDetailLabel">{{ $client->name. ' ' .$client->lastname }}</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-12">
                <form action="{{route('clients.update', $client)}}" method="POST">
                    @csrf
                    @method('put')
                    <h6 class="rounded-pill bg-dark text-center text-white fw-bold fs-6 py-1">Datos Personales</h6>

                    <div class="form-floating my-2">
                        <input type="text" class="form-control ps-4" id="inputName" placeholder="Nombre(s)" name="name" value="{{ $client->name }}">
                        <label class="inputName">Nombre(s)</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control ps-4" id="inputLastname" placeholder="Apellido(s)" name="lastname" value="{{ $client->lastname }}">
                        <label class="inputLastname">Apellido(s)</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control ps-4" id="inputPhone" placeholder="Telefono" name="phone" value="{{ $client->phone }}">
                        <label class="inputPhone">Telefono</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control ps-4" id="inputAddress" placeholder="Direccion" name="address" value="{{ $client->address }}">
                        <label class="inputAddress">Direccion</label>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-arrow-clockwise"></i>
                            Actualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <hr class="text-dark p-2 rounded-pill">
        <div class="row justify-content-center">
            @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
            <div class="col-12 text-center pb-2">
                <form action="{{ route('clients.destroy', $client) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-person-dash-fill"></i>
                        Eliminar Cliente
                    </button>
                </form>
            </div>
            @endif
            <div class="col-12 text-center pb-2">
                <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#createClient">
                    <i class="bi bi-person-plus-fill"></i>
                    Nuevo
                </button>
            </div>
        </div>
    </div>
</div>
