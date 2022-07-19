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
                            <button class="btn btn-outline-dark btn-sm mx-auto d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
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
                            <button class="btn btn-outline-dark btn-sm mx-auto d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
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
