<div class="modal fade" id="createProvider" tabindex="-1" aria-labelledby="createProviderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-6 fw-bold text-center bg-dark rounded p-2 text-white" id="createProviderLabel">Nuevo Proveedor</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('providers.store') }}" method="post">
                    @csrf
                    <div class="form-floating my-2">
                        <input required type="text" class="form-control  ps-4" name="name" id="nameInput" placeholder="Nombre del Proveedor" value="{{ old('name') }}">
                        <label for="nameInput">Nombre del Proveedor</label>
                        {!! $errors->first('name', '<small>:message</small>') !!}
                    </div>
                    <div class="form-floating my-2">
                        <input required type="text" id="inputContact" class="form-control ps-4" onkeypress="return soloLetras(event)" name="contact" placeholder="Nombre de Titular" value="{{ old('contact') }}">
                        <label for="inputContact">Nombre de Titular</label>
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-floating my-2">
                        <input required type="text" class="form-control ps-4" placeholder="Telefono" id="phone" name=" phone" value="{{ old(' phone') }}">
                        <label for="inputPhone">Telefono</label>
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-floating my-2">
                        <input required type="text" class="form-control ps-4" placeholder="Direccion" id="inputAddress" name="address" value="{{ old('address') }}">
                        <label for="inputAddress">Dirección </label>
                        {!! $errors->first('username', '<small>:message</small>') !!}
                    </div>

                    <div class="form-group text-center my-2">
                        <h6 class="bg-dark rounded-pill text-white text-center fw-bold py-2">Estado</h6>
                        <input value="1" type="radio" class="btn-check" name="status" id="activo" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="activo">Activo</label>

                        <input value="0" type="radio" class="btn-check" name="status" id="inactivo" autocomplete="off">
                        <label class="btn btn-outline-danger" for="inactivo">Inactivo</label>
                    </div>

                    <div class="form-group text-center my-2">
                        <button class="btn btn-dark btn-md">
                            Crear Proveedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('script')
   
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
