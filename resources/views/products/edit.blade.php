@extends('layout.index')
@section('content')
@include('alerts.errors')

<body class="bg-light-joduma">
    <div class="row justify-content-center bg-light w-75 shadow-lg rounded my-3 p-1 p-xl-5 mx-auto">
        <h2 class="text-center">Editar Producto</h2>
        <div class="row justify-content-center">
            <div class="col-4 my-3">
                @if($product->photo)
                    <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->code }}" class="img-fluid mx-auto rounded d-block" width="150px">
                @else
                    <img src="{{ asset('img/product/product.png') }}" alt="product-image" class="img-fluid mx-auto rounded d-block" width="150px">
                @endif
            </div>
        </div>
        <section class="col-11 col-lg-6 col-xl-5">
            <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
                <hr>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="form-floating py-2">
                            <input required type="text" class="form-control ps-4" id="inputCode" placeholder="Codigo" name="code" value="{{ $product->code }}">
                            <label for="inputCode">Código</label>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="form-floating py-2">
                            <input required type="text" class="form-control ps-4" placeholder="Existencias" id="inputCantidad" name="stock" value="{{ $product->stock }}">
                            <label for="inputCantidad">Existencias</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating py-2">
                    <input required type="text" class="form-control ps-4" id="inputDescription" placeholder="Descripcion" name="description" value="{{ $product->description }}">
                    <label for="inputDescription">Descripción</label>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input required type="text" class="form-control" placeholder="Precio de Proveedor" id="inputPrecio" name="provider_price" value="{{ $product->provider_price }}">
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input required type="text" class="form-control ps-4" id="inputPrice" placeholder="Precio de Venta" name="price" value="{{ $product->price }}">
                        </div>
                    </div>
                </div>

                <div class="form-group my-2">
                    <select required class="form-control" name="provider_id">
                        <option value="{{ $product->provider->id }}" selected> {{ $product->provider->name }}</option>
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

                <div class="form-switch my-2">
                    <input class="form-check-input py-2" type="checkbox" role="switch" id="wholesale" name="wholesale" value="5">
                    <label class="form-check-label" for="wholesale">Venta a Mayoreo</label>
                </div>
                <div class="isChecked d-none" id="wholesale-price-show">
                    <h6 class="text-center py-2 fw-bold text-white rounded-pill bg-dark fs-6">Datos de Mayoreo</h6>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control ps-4" id="wholesale_price" name="wholesale_price" placeholder="Precio de mayoreo" value="{{ $product->wholesale_price }}">
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control ps-4" id="wholesale_quantity" name="wholesale_quantity" placeholder="A partir de..." value="{{ $product->wholesale_quantity }}">
                                <span class="input-group-text">Pz.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group my-2">
                    <button class="btn btn-dark btn-sm">
                        Guardar
                    </button>
                    <a href="{{ route('products.index') }}" class="text-end">regresar</a>
                </div>
            </form>
        </section>
    </div>
    @endsection
    @section('script')
    <script>
        $(document).ready(() => {
            const data = getDomObjects();

            contentToggle(data);

            $(data.wholesale).change(() => {
                contentToggle(data);
            });
        });

        const getDomObjects = () => {
            const wholesale = $('#wholesale');
            const content = $('#wholesale-price-show');
            const wholesalePrice = $('#wholesale_price');
            const wholesaleQuantity = $('#wholesale_quantity');

            return {
                wholesale,
                content,
                wholesalePrice,
                wholesaleQuantity,
            }
        }

        const contentToggle = data => {

            const {
                wholesale,
                content,
                wholesalePrice,
                wholesaleQuantity
            } = data;

            if (wholesale.prop('checked')) {
                content.removeClass('d-none');
                wholesale.attr('value', '1');
                wholesalePrice.attr('required', 'true');
                wholesaleQuantity.attr('required', 'true');
                return false;
            }
            content.addClass('d-none');
            wholesale.attr('value', '0');
            wholesalePrice.removeAttr('required');
            wholesaleQuantity.removeAttr('required');
            wholesalePrice.val(null);
            wholesaleQuantity.val(null);
        }
    </script>
    @endsection
