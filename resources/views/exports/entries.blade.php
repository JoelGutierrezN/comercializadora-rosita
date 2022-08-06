<table>
    <thead>
    <tr>
        <th>Producto</th>
        <th>Descripcion del producto</th>
        <th>Provedor</th>
        <th>Piezas</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tbody>
    @foreach($entries as $entry)
        <tr>
            <td>{{ $entry->product->code }}</td>
            <td>{{ $entry->product->description }}</td>
            <td>{{ $entry->provider->name }}</td>
            @if($entry->entry === 1)
                <td>+{{ $entry->pcs }}</td>
            @else
                <td>-{{ $entry->pcs }}</td>
            @endif
            <td>{{ $entry->created_at->format('d/m/y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
