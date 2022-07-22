<table>
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Precio de Proveedor</th>
        <th>Precio de Venta</th>
        <th>Existencias</th>
        <th>Fecha de creacion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->code }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->provider_price }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->stock }}pz</td>
            <td>{{ $product->created_at->format('d-m-y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
