@extends('home.layouts.app')

@section('title', 'Inicio')

@section('content')

    <div class="container-fluid mt-1 m-0 px-0">
        <h6 class="bg-primario p-5 text-center text-white fs-4 mb-0 fw-bold">
            Destacados Recientes<br>
            <span class="fs-6 fw-normal">Disfruta nuestros productos nuevos y recientemente agregados</span>
        </h6>
    </div>

    <div class="container-fluid mt-0">
        <div class="row align-items-top justify-content-center px-5 pb-3">
            @foreach ($offers as $product)
                <div class="col-10 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 my-2">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->get_photo }}" class="card-img-top w-100" height="175px" alt="{{ $product->code }}">
                        <div class="card-body">
                            <p class="card-text text-center">{{ substr($product->description, 0, 60).'...' }}</p>
                        </div>
                        <div class="card-footer">
                            <p class="fw-bold text-center fs-4 text-terciario">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3 px-0">
        <h6 class="bg-cuaternario p-5 text-center text-success fs-4 mb-0 fw-bold">
            Productos de Calidad<br>
            <span class="fs-6 fw-normal">Contamos con un gran catalogo de productos para toda la ocasion</span>
        </h6>
    </div>

    <div class="container-fluid mt-0">
        <div class="row align-items-top justify-content-center px-5 pb-3 my-2">
            @foreach ($products as $product)
                @continue($loop->index <= 6)
                <div class="col-10 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 my-2">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->get_photo }}" class="card-img-top w-100" height="175px" alt="{{ $product->code }}">
                        <div class="card-body">
                            <p class="card-text text-center">{{ substr($product->description, 0, 60).'...' }}</p>
                        </div>
                        <div class="card-footer">
                            <p class="fw-bold text-center fs-4 text-terciario">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col-12 mb-5 pb-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
