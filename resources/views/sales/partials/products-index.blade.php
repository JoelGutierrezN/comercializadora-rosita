<style>

    @media (max-width: 980px) {
        .quantity-input{
            width: 5rem;
        }
    }

</style>
<div class="modal fade" id="addProduct" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Productos({{ $products->count() }})</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body overflow-auto table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Existencias</th>
                            <th>Precio</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($products as $product)
                            @if($product->stock > 0)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td class="d-none d-md-table-cell">{{ $product->description }}</td>
                                <td class="d-md-none">{{ $product->get_description }}...</td>
                                <td id="stock">{{ $product->stock }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    <form action="{{ route('temporary.store', [$sale, $product]) }}" method="post"
                                        class="d-flex flex-row px-4">
                                        @csrf
                                        <input class="quantity-input" type="number" name="quantity" id="quantity" required>
                                        <button class="btn btn-danger add">+</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay productos en existencia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
