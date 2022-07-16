@section('style')
<style>
    .wholesale-price-show {
        display: none;
    }
</style>
@endsection
<div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-6 fw-bold text-center bg-dark rounded p-2 text-white" id="createProductLabel">Crear Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="form-floating py-2">
                                <input required type="text" class="form-control ps-4" id="inputCode" placeholder="Codigo" name="code" value="{{ old('code') }}">
                                <label for="inputCode">Código</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-floating py-2">
                                <input required type="text" class="form-control ps-4" placeholder="Existencias" id="inputCantidad" name="stock" value="{{ old('stock') }}">
                                <label for="inputCantidad">Existencias</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating py-2">
                        <input required type="text" class="form-control ps-4" id="inputDescription" placeholder="Descripcion" name="description" value="{{ old('description') }}">
                        <label for="inputDescription">Descripción</label>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input required type="text" class="form-control" placeholder="Precio de Proveedor" id="precio" name="provider_price" value="{{ old('provider_price') }}">
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input required type="text" class="form-control ps-4" id="price" placeholder="Precio de Venta" name="price" value="{{ old('price') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group my-2">
                        <select required class="form-control" name="provider_id" value="{{ old('provider_id') }}">
                            <option value="" selected disabled>--Seleccionar Proveedor--</option>
                            @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="my-2">
                        <label for="formFile" class="form-label fw-bold">Imagen del Producto</label>
                        <input class="form-control" type="file" id="formFile" name="photo" accept="image/*">
                    </div>

                    <hr>

                    <div class="form-group my-2">
                        <button class="btn btn-dark btn-sm">
                            Crear Producto
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
            document.getElementById("precio").addEventListener('keypress', (e) => {
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

