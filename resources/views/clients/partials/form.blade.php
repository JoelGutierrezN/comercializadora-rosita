<div class="modal fade" id="createClient" tabindex="-1" aria-labelledby="createClientLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-6 fw-bold text-center bg-dark rounded p-2 text-white" id="createUserLabel">Cliente Nuevo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clients.store') }}" method="post">
                    @csrf
                    <div class="form-floating py-2">
                        <input required type="text" class="form-control ps-4" onkeypress="return soloLetras(event)" name="name" value="{{ old('name')}}" id="nameInput" placeholder="Nombre(s)">
                        <label for="nameInput" for="inputValid">Nombre(s)</label>
                    </div>
                    <div class="form-floating py-2">
                        <input required type="text" class="form-control ps-4" onkeypress="return soloLetras(event)" name="lastname" value="{{ old('lastname')}}" id="lastnameInput" placeholder="Apellido(s)">
                        <label for="lastnameInput">Apellido(s)</label>
                    </div>
                    <div class="form-floating py-2">
                        <input required type="text" class="form-control ps-4" name="phone"  value="{{ old('phone')}}" id="phone" placeholder="Telefono de Contacto">
                        <label for="inputPhone">Telefono de Contacto</label>
                    </div>
                    <div class="form-floating py-2">
                        <input required type="text" class="form-control ps-4" name="address" value="{{ old('address')}}" id="inputAddress" placeholder="Direccion">
                        <label for="inputAddress">Direccion</label>
                    </div>
                    <div class="form-group py-2">
                        <button class="btn btn-dark btn-md">
                            Crear Cliente
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
