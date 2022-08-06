@extends('layout.index')

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-12 col-lg-6">

                <h1 class="bg-light p-5 fs-5 text-center fw-bold">Registrar Entrada de Producto - Slyventshop</h1>

                <form action="{{ route('entries.store') }}" method="POST" class="p-4 bg-white shadow-lg">
                    @csrf
                    @method('POST')

                    <div class="form-group my-2">
                        <label for="select-products" class="d-block text-center fw-bold mb-2">Proveedor</label>
                        <select name="provider_id" id="select-providers" required class="form-select">
                            <option selected disabled>-- Selecciona un provedor --</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-2">
                        <label for="select-products" class="d-block text-center fw-bold mb-2">Producto</label>
                        <select name="product_id" id="select-products" required class="form-select">
                            <option selected disabled>-- Debes seleccionar un proveedor --</option>
                        </select>
                    </div>

                    <h6 class="d-block text-center fw-bold mb-2">Número de Piezas Entrantes</h6>

                    <div class="form-group my-2 w-50 text-center mx-auto">

                        <label class="visually-hidden" for="number-of-pieces">25</label>

                        <div class="input-group mx-auto my-2">
                            <div class="input-group-text">#</div>
                            <input type="number" name="pcs" id="number-of-pieces" class="form-control mx-auto" placeholder="25" required>
                            <div class="input-group-text">Pz.</div>
                        </div>
                    </div>

                    <div class="form-group p-3 text-center">
                        <button type="submit" class="btn btn-dark" id="save-entry-btn">Guardar Entrada</button>
                        <a href="{{ route('entries.index') }}" class="btn">Regresar...</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/entries/main.js') }}"></script>
@endsection
