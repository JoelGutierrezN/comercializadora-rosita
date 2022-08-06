@extends('layout.index')

@section('content')
    @include('alerts.info')
    @include('alerts.warning')

    <body class="bg-light-joduma h-auto">

    <aside class="controls-providers">
        <div class="my-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProvider">
                <i class="bi bi-person-plus-fill"></i>
            </button>
            <span class="fw-bold overlay">Agregar Nuevo Proveedor</span>
        </div>
    </aside>
    @include('providers.partials.form')
    <div class="row h-25 p-3">
        <div class="col">
            <h1 class="text-center mt-3 text-white fw-bold">Directorio de Provedores</h1>
            <div class="row ps-5 pe-5 justify-content-center text-center text-white fw-bold">
                <div class="col-lg-1 bg-info mx-5">
                    <p class="m-0">
                        <span class="d-block">Proveedores</span>
                        {{ $providers->total() }}
                    </p>
                </div>
                <div class="col-lg-1 bg-success mx-5">
                    <p class="m-0">
                        <span class="d-block">Activos</span>
                        {{ $active }}
                    </p>
                </div>
                <div class="col-lg-1 bg-danger mx-5">
                    <p class="m-0">
                        <span class="d-block">Inactivos</span>
                        {{ $inactive }}
                    </p>
                </div>
                <div class="col-lg-1 mx-5">
                    <a href="{{ route('providers.export') }}" class="btn btn-success ms-1" target="_blank">Exportar a Excel</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-md-2 p-md-5 pb-md-0 p-sm-2">
        <div class="row justify-content-center mb-3">
            @forelse ($providers as $provider)
                <div class="col-lg-4 col-xl-3 col-sm-6 col-md-6 m-2 shadow p-5 text-center provider bg-light rounded">
                    <div class="btn-delete-container">
                        <form action="{{ route('providers.destroy', $provider) }}" method="post" title="Eliminar">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminar')">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </form>
                    </div>
                    <p class="{{ $provider->get_class }} w-auto fs-6 fw-bold fst-italic rounded-pill">
                        {{ $provider->name }}
                    </p>
                    <p>
                        <i class="bi bi-person-fill"></i>
                        - {{ $provider->contact }}
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i>
                        - {{ $provider->phone }}
                    </p>
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        - {{ $provider->address }}
                    </p>

                    <button
                        data-bs-target="#editProvider{{ $provider->id }}"
                        data-bs-toggle="modal"
                        class="btn btn-warning btn-sm d-block w-100 btn-edit"
                        title="Editar">
                        <i class="bi bi-pencil-square"></i>
                        Editar
                    </button>
                    @include('providers.partials.edit')
                </div>

            @empty
                <h3 class="text-center">No hay Proveedores en existencia</h3>
            @endforelse
        </div>
        <div class="row">
            <div class="col-4 m-auto">
                {{ $providers->links() }}
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
