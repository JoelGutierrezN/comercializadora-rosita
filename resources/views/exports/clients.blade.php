<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Direccion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->name . ' ' . $client->lastname }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
