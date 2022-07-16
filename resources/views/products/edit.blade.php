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
