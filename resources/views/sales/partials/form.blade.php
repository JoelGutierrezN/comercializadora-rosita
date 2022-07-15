<div class="modal fade" id="addProduct" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body overflow-auto">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Existencias</th>
                            <th>Precio Mayoreo C/U</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->description }}</td>
                                <td id="stock">{{ $product->stock }}</td>
                                <td>{{ $product->wholesale_price > 0 ? $product->wholesale_price : 'NA' }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    <form action="{{ route('temporary.store', [$sale, $product]) }}" method="post"
                                        class="d-flex flex-row px-4" class="form-product">
                                        @csrf
                                        <input type="number" name="quantity" id="quantity" required>
                                        <button class="btn btn-danger add">+</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay usuarios en existencia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
