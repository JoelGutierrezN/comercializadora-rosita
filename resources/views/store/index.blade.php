@extends('layout.index')

@section('content')

<body class="bg-light-joduma">

    <div class="container-fluid h-100">
        <div class="row h-100 justify-content-around">
            <div class="col-11 col-lg-8 bg-white rounded shadow-lg my-5 p-1 p-lg-5">
                <div class="row align-items-center justify-content-center mb-3">
                    <div class="col-11 col-md-4 col-xl-4 my-2">
                        <h6 class="text-center fw-bold fs-4" id="newSale >
                            Ventas
                        </h6>
                    </div>
                    <div class=" col-11 col-xl-4 text-center my-2">
                            <a href="{{route('sales.create')}}" class="btn btn-sm btn-success">
                                <i class="bi bi-bag-plus-fill"></i>
                                Nueva Venta
                            </a>
                    </div>
                </div>
                <div class="container text-center">
                    <ul class="list-group">
                        @foreach($sales as $sale)
                        <button type="button" class="list-group-item fw-bold list-group-item-action my-2 list-group-item-{{ $sale->get_status_class }}" data-bs-toggle="offcanvas" href="#saleDetail{{ $sale->id }}">
                            <div class="row align-items-center">
                                <div class="col-6 col-xl-3">
                                    Ticket #{{ $sale->id }}
                                </div>
                                <div class="col-6 col-xl-5">
                                    <p class="m-0">
                                        <span class="align-top">
                                            {{ $sale->user->name. ' ' .$sale->user->lastname }}
                                        </span>
                                        <span class="text-danger fw-light fst-italic fs-6 align-bottom">
                                            {{ $sale->user->role->name }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-6 col-xl-2">
                                    {{ $sale->created_at->format('d/M/Y')}}
                                </div>
                                <div class="col-6 col-xl-2">
                                    <span class="badge bg-success rounded-pill p-1 p-xl-2">${{ $sale->get_total }}</span>
                                </div>
                            </div>
                        </button>
                        @include('store.partials.sale-detail')
                        @endforeach
                    </ul>
                    <div class="container">
                        {{ $sales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script src="{{asset('./js/sale.js')}}" defer></script>
    @endsection
    @endsection
