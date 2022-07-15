@extends('layout.index')

@section('content')
    @include('alerts.info')
    <body class=" h-100 bg-light-joduma">
        <div class="container  mt-5">
            <h1 class="text-center mt-3 fw-bold">Nueva venta</h1>
            <div class="my-2 w-100">
                <div class="col-md-8 w-100">
                    <label for="clients" class="fw-bold fs-4">Seleccione un cliente: </label>
                    <div class="d-flex">
                        <select name="client" id="clients" class="form-select w-full">
                            <option value="">--Seleciona un cliente--</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }} {{ $client->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div id="client-section"></div>

                <div>
                    <h4 class="fw-bold fs-4">Buscar producto</h4>
                    <input type="text" id="code-product" placeholder="Ingresa el código o usar el scaner" name="code"
                        class="form-control py-2 px-4 mb-5 fs-2 fw-bold text-uppercase">
                </div>
                <div class="overflow-auto">
                    <table class="table table-dark">
                        <thead class="text-center">
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="products-section" class="text-center">
                        </tbody>
                    </table>
                </div>
                <div class="d-flex align-items-end flex-column mt-5">
                    <div id="discount-section" class="d-flex align-items-center"></div>
                    <p id="subtotal"></p>
                    <p id="total"></p>
                    <div id="save-sale" class="d-flex">

                    </div>
                </div>
            </div>
        </div>
    @section('script')
        <script src="{{ asset('js/sale.js') }}" defer></script>
    @endsection
@endsection
