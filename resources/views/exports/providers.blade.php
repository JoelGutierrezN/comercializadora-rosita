<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Contacto</th>
        <th>Telefono</th>
        <th>Direccion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($providers as $provider)
        <tr>
            <td>{{ $provider->name }}</td>
            <td>{{ $provider->contact }}</td>
            <td>{{ $provider->phone }}</td>
            <td>{{ $provider->address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
