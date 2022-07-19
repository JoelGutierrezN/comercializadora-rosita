<div class="modal fade" id="editClient{{ $client->id }}" tabindex="-1" aria-labelledby="editClientLabel{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-6 fw-bold text-center bg-dark rounded p-2 text-white" id="editClientLabel{{ $client->edit }}">Editar Provedor</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('clients.update', $client)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-floating my-2">
                        <input required type="text" class="form-control  ps-4" name="name" id="nameInput" placeholder="Nombre del Proveedor" value="{{ $client->name }}">
                        <label for="nameInput">Nombre del Proveedor</label>
                        {!! $errors->first('name', '<small>:message</small>') !!}
                    </div>
                    <div class="form-floating my-2">
                        <input required type="text" id="inputApellidos" class="form-control ps-4" name="lastname" onkeypress="return soloLetras(event)" placeholder="Apellidos" value="{{ $client->lastname }}">
                        <label for="inputContact">Apellidos</label>
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-floating my-2">
                        <input required type="text" class="form-control ps-4" placeholder="Telefono" id="phone" name=" phone" value="{{ $client->phone }}">
                        <label for="inputPhone">Telefono</label>
                        {!! $errors->first('lastname', '<small>:message</small>') !!}
                    </div>
                    <div class="form-floating my-2">
                        <input required type="text" class="form-control ps-4" placeholder="Direccion" id="inputAddress" name="address" value="{{ $client->address }}">
                        <label for="inputAddress">Dirección </label>
                        {!! $errors->first('username', '<small>:message</small>') !!}
                    </div>

                    <div class="form-group my-3 text-center">
                        <button class="btn btn-dark btn-md">Actualizar</button>
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
