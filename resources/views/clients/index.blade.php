@extends('layout.index')

@section('content')
    @include('alerts.info')
    @include('alerts.warning')

    <body class="bg-light-joduma h-auto">

    <aside class="controls-clients">
        <div class="my-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createClient">
                <i class="bi bi-person-plus-fill"></i>
            </button>
            <span class="fw-bold overlay">Agregar Nuevo Cliente</span>
        </div>
    </aside>
    @include('clients.partials.form')
    <div class="row h-25 p-3">
        <div class="col">
            <h1 class="text-center mt-3 text-white fw-bold">Directorio de Clientes</h1>
            <div class="row ps-5 pe-5 justify-content-center text-center text-white fw-bold">
                <div class="col-lg-1 bg-info mx-5">
                    <p class="m-0">
                        <span class="d-block">Clientes</span>
                        {{ $clients->total() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-md-2 p-md-5 pb-md-0 p-sm-2">
        <div class="row justify-content-center mb-3">
            @forelse ($clients as $client)
                <div class="col-lg-4 col-xl-2 col-sm-5 col-md-6 m-2 shadow p-5 text-center provider bg-light rounded">
                    <div class="btn-delete-container">
                        <form action="{{ route('clients.destroy', $client) }}" method="post" title="Eliminar">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminar')">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </form>
                    </div>
                    <p class="{{ $client->get_class }} w-auto fs-6 fw-bold fst-italic rounded-pill">
                        {{ $client->name. ' ' . $client->lastname }}
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i>
                        - {{ $client->phone }}
                    </p>
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        - {{ $client->address }}
                    </p>

                    <button
                        data-bs-target="#editClient{{ $client->id }}"
                        data-bs-toggle="modal"
                        class="btn btn-warning btn-sm d-block w-100 btn-edit"
                        title="Editar">
                        <i class="bi bi-pencil-square"></i>
                        Editar
                    </button>
                    @include('clients.partials.edit')
                </div>

            @empty
                <h3 class="text-center">No hay Clientes en existencia</h3>
            @endforelse
        </div>
        <div class="row">
            <div class="col-4 m-auto">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $(".alert").delay(3000).slideUp(300);
        });
    </script>
@endsection
