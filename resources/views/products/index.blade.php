@extends('layout.index')

@section('content')
    @include('alerts.info')
    @include('alerts.errors')

    <body class="bg-light-joduma h-100">
        <div class="container-fluid w-75 product-page-container m-auto my-5 bg-light">
            <div class="row justify-content-around align-items-center shadow-lg px-md-5 p-1">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row my-2 justify-content-center">
                                <div class="col-12 my-2 text-center">
                                    <a href="" class="btn btn-warning btn-md" title="Crear" data-bs-toggle="modal"
                                        data-bs-target="#createProduct">
                                        <i class="bi bi-plus-lg"></i> Nuevo Producto
                                    </a>
                                    @include('products.partials.form', [
                                        'providers' => $providers,
                                    ])
                                </div>

                                <div class="col-6 col-md-3">
                                    <div class="card bg-info text-center p-3 text-white fw-bold">
                                        <p class="mb-1">
                                            Productos
                                        </p>
                                        {{ $products->total() }}
                                    </div>
                                </div>

                                <div class="col-6 col-md-3">
                                    <div class="card bg-success text-center p-3 text-white fw-bold">
                                        <p class="mb-1">
                                            Activos
                                        </p>
                                        {{ $active_products->count() }}
                                    </div>
                                </div>

                                <div class="col-6 col-md-3">
                                    <div class="card bg-danger text-center p-3 text-white fw-bold">
                                        <p class="mb-1">
                                            Inactivos
                                        </p>
                                        {{ $inactive_products->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-3 border me-3 overflow-auto">
                            <div class="row products-container">
                                @forelse ($products as $product)
                                    <div class="col-lg-12 bg-light py-1 px-2 mb-1 border border-secondary">
                                        <div class="row justify-content-between align-items-center">

                                            <div class="col-lg-2 col-xl-1 col-2 col-md-2">
                                                @if ($product->photo)
                                                    <img src="{{ $product->get_photo }}" alt="{{ $product->code }}"
                                                        class="w-100 rounded-circle">
                                                @else
                                                    <img src="{{ asset('img/product/product.png') }}" alt="product-image"
                                                        class="w-100 rounded-circle">
                                                @endif
                                            </div>
                                            <div class="col-lg-12 col-xl-8 col-12 text-center">
                                                <div class="row">
                                                    <div class="col mx-auto">
                                                        <span class="d-flex justify-content-center">
                                                            {{-- {!! $product->bar_code !!} --}}
                                                        </span>

                                                        <p class="fw-bold">
                                                            {{ $product->code }}
                                                        </p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="row">
                                                            @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                                                                <div class="col-lg-4">
                                                                    <p class="text-primary">
                                                                        <i class="bi bi-truck"></i>
                                                                        ${{ $product->provider_price }}
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            <div class="col-lg-4">
                                                                <p class="text-success">
                                                                    <i class="bi bi-shop"></i>
                                                                    ${{ $product->price }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-secondary">
                                                            {{ $product->get_description }}
                                                            <a data-bs-toggle="offcanvas"
                                                                href="#detailProduct{{ $product->id }}" role="button"
                                                                aria-controls="offcanvasExample">
                                                                [ver más]
                                                            </a>
                                                        </p>
                                                        <div class="offcanvas offcanvas-end bg-light" tabindex="-1"
                                                            id="detailProduct{{ $product->id }}"
                                                            aria-labelledby="offcanvasExampleLabel">
                                                            <div class="offcanvas-header w-100 d-block">
                                                                <h5 class="fs-6 fw-bold text-center"
                                                                    id="offcanvasExampleLabel">
                                                                    <span
                                                                        class="text-success fs-5 fw-bold d-block mb-3">{{ $product->code }}</span>
                                                                    <span class="fst-italic d-block text-secondary mb-2">
                                                                        {{ $product->stock }} Disponible(s)
                                                                    </span>
                                                                    <span>
                                                                        <button type="button" class="btn-close text-reset"
                                                                            data-bs-dismiss="offcanvas"
                                                                            aria-label="Close"></button>
                                                                    </span>
                                                                </h5>
                                                            </div>
                                                            <div
                                                                class="offcanvas-body text-center border-2 border-dark border-top">
                                                                <div class="row">
                                                                    <div class="col-8 m-auto">
                                                                        @if ($product->photo)
                                                                            <img src="{{ Storage::url($product->photo) }}"
                                                                                alt="{{ $product->code }}"
                                                                                class="w-25 border-rounded">
                                                                        @else
                                                                            <img src="{{ asset('img/product/product.png') }}"
                                                                                alt="product-image"
                                                                                class="w-25 border-rounded">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-8 m-auto">
                                                                        <p class="fw-bold">Descripcion</p>
                                                                        <p>{{ $product->description }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                                                                        <div class="col-sm-12 col-lg-6 m-auto">
                                                                            <p class="text-primary">
                                                                                <i class="bi bi-truck d-block"></i>
                                                                                <span class="fw-bold">Precio de
                                                                                    Provedor</span>
                                                                                <span class="fw-bold">
                                                                                    ${{ $product->provider_price }}
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-sm-12 col-lg-6 m-auto">
                                                                        <p class="text-success">
                                                                            <i class="bi bi-shop d-block"></i>
                                                                            <span class="d-block class=" fw-bold"">Precio en
                                                                                Tienda</span>
                                                                            <span
                                                                                class="fw-bold">${{ $product->price }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="fst-italic">
                                                            {{ $product->stock }} Disponible(s)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                                                <div class="col-lg-12 col-xl-2 col-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a href="{{ route('products.edit', $product) }}"
                                                                class="btn btn-warning btn-sm d-block w-100" title="Editar">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <form action="{{ route('products.destroy', $product) }}"
                                                                method="post" title="Eliminar" class="product-delete">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm db-block w-100"
                                                                    onclick="return confirm('Seguro que deseas eliminar')">
                                                                    <i class="bi bi-trash3-fill"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                @empty
                                    <p>no hay productos</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <div class="m-auto overflow-auto cointainer">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
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
