<div class="offcanvas offcanvas-end" tabindex="-1" id="saleDetail{{ $sale->id }}" aria-labelledby="SaleDetailLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="SaleDetailLabel">{{ $sale->get_client_name }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="row">
            <div class="col-12">
                <h6 class="rounded-pill bg-dark text-white text-center fs-6 fw-bold pb-1">Datos de Venta</h6>
                <section>
                    <p class="fw-bold text-{{ $sale->get_status_class }}">-- {{ $sale->get_status_type }} --</p>
                    <p class="fw-bold">Monto: ${{ $sale->get_total }}</p>
                    <p class="text-secondary fst-italic fs-6">Realizada el {{ $sale->created_at->format('d-m-Y') }} a las {{ $sale->created_at->format('h:i:s')}}</p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h6 class="rounded-pill bg-dark text-white text-center fs-6 fw-bold pb-1">Datos de Vendedor</h6>
                <section>
                    <p>
                        <span class="fst-itallic fs-6 text-danger">{{ Str::upper($sale->user->role->name) }}</span>
                        {{ $sale->user->name. ' ' .$sale->user->lastname}}
                    </p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h6 class="rounded-pill bg-dark text-white text-center fs-6 fw-bold pb-1">Datos de Cliente</h6>
                <p>{{ $sale->get_client_name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h6 class="rounded-pill bg-dark text-white text-center fs-6 fw-bold pb-1">Funciones de Venta</h6>
            </div>

            <div class="col-12">
                @if ($sale->status != '3' && (Auth::user()->role_id === 1))
                <form action="{{ route('sale.delete', $sale) }}" method="POST" title="Anular">
                    @csrf
                    @method('put')
                    <button class="btn btn-danger btn-sm my-2" title="anular">
                        <i class="bi bi-slash-circle"></i>
                        Anular Venta
                    </button>
                </form>
                @endif

                @if ($sale->status == '1')
                    <a title="ver" href="{{ route('sales.show', $sale) }}" class="btn btn-warning btn-sm my-2">
                        <i class="bi bi-eye-fill"></i>
                        Ver Venta
                    </a>
                @endif

                @if ($sale->status != '1' && (Auth::user()->role_id === 1))
                <form action="{{ route('sales.destroy', $sale) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm my-2" title="ticket">
                        <i class="bi bi-filetype-pdf"></i>
                        Eliminar Venta
                    </button>
                </form>
                @endif
            </div>

            <div class="col-12">
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-success my-2">
                        <i class="bi bi-bag-plus-fill"></i>
                        Nueva Venta
                    </button>
                </form>
            </div>

            <div class="col-12">
                @if ($sale->status != '1')
                <td>
                    <a href="{{ route('sale.report', $sale) }}" class="btn btn-info btn-sm my-2" title="reporte" target="_blank">
                        <i class="bi bi-filetype-pdf"></i>
                        Ver Ticket
                    </a>
                </td>
                @endif
            </div>
        </div>


    </div>
</div>
