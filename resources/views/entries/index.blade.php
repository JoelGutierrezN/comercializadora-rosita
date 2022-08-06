@extends('layout.index')

@section('content')
@include('alerts.info')
@include('alerts.errors')

    <body class="bg-light-joduma h-100">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <a href="{{ route('entries.create') }}" class="btn btn-info text-white fw-bold mt-2">Declarar Entrada de Productos</a>
                    <a href="{{ route('entries.export') }}" class="btn btn-success ms-1" target="_blank">Exportar a Excel</a>
                </div>
                <div class="col-12 bg-white p-5 mt-5">

                    <h1 class="text-center bg-light fw-bold fs-5 p-4">Registro de Entradas y Salidas de Productos</h1>
                    <div class="list-group">
                        @foreach ($entries as $entry)
                            @if($entry->entry === 1)
                                <a href="" class="list-group-item list-group-item-action list-group-item-success">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-4">
                                            <h3 class="fs-6">{{ $entry->product->code }}</h3>
                                            <small class="text-muted">{{ substr($entry->product->description, 0, 45).'...' }}</small>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <h3 class="fs-6 text-centetr">Provedor</h3>
                                            <small class="text-muted">{{ $entry->provider->name }}</small>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <h3 class="fs-6 text-centetr">Fecha</h3>
                                            <small class="text-muted">{{ $entry->created_at->format('d/m/y')}}</small>
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            @if($entry->entry === 1)
                                                <h6 class="fs-6 text-center">+{{ $entry->pcs }} Pz.</h6>
                                            @else
                                                <h6 class="fs-6 text-center">-{{ $entry->pcs }} Pz.</h6>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="" class="list-group-item list-group-item-action list-group-item-danger">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-4">
                                            <h3 class="fs-6">{{ $entry->product->code }}</h3>
                                            <small class="text-muted">{{ substr($entry->product->description, 0, 45).'...' }}</small>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <h3 class="fs-6 text-centetr">Provedor</h3>
                                            <small class="text-muted">{{ $entry->provider->name }}</small>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <h3 class="fs-6 text-centetr">Fecha</h3>
                                            <small class="text-muted">{{ $entry->created_at->format('d/m/y')}}</small>
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            @if($entry->entry === 1)
                                                <h6 class="fs-6 text-center">+{{ $entry->pcs }} Pz.</h6>
                                            @else
                                                <h6 class="fs-6 text-center">-{{ $entry->pcs }} Pz.</h6>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                      </div>
                </div>
                <div class="col-12">
                    {{ $entries->links(); }}
                </div>
            </div>
        </div>
    </body>
@endsection
