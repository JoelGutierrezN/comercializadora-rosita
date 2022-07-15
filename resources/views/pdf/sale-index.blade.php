<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
</head>
<body>
    <section>
        <div class="img-logo" >
            {{--<img src="{{ public_path('img/sello.png') }}" width="150px">--}}
        </div>
        <h2 > <center> Ticket #{{ $sale->id }} </center></h2>
        <hr color="black" size=3>

        
        <table>
            <thead>
                <tr>
                    <td>Producto |</td>
                    <td>Precio U. |</td>
                    <td>Cantidad |</td>
                    <td>total </td>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($sale->products) as $detail)
                    <tr>
                        
                        <td>
                            {{ $detail->product->code }}
                        </td>
                        
                        <td>
                            ${{ $detail->product->price }}
                        </td>
                        <td>
                            {{ $detail->quantity }}
                        </td>
                        <td>
                            ${{ $detail->total }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr color="black" size=3>
        <table>
            <thead>
                <tr>
                    <th>Subtotal |</th>
                    <th>Descuento |</th>
                    <th>Total |</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${{ $sale->subtotal }}</td>
                    <td>${{ $sale->discount }}</td>
                    <td>${{ $sale->total }}</td>
                </tr>
            </tbody>
            <br>
        </table>
        <span>Fecha {{ $sale->created_at->format('d-m-Y ------------ h:i:s') }}
            hrs</span>
        @if ($sale->client)
            <h6> Cliente </h6>
            <p> {{ $sale->client->name . ' ' . $sale->client->lastname }} </p>
        @endif
        <hr color="black" size=3>
    </section>
</body>

</html>
