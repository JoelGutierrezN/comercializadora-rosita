<?php

namespace App\Http\Controllers;

use App\Exports\ClientExport;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Clients\ClientRequest;

class ClientController extends Controller
{

    public function index(){
        $clients = Client::latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function store(ClientRequest $request)
    {
        $client = new Client($request->all());
        $client->user_id = auth()->user()->id;
        $client->save();
        return back()->with('success', 'Creado con Exito');
    }

    public function update(ClientRequest $request, Client $client )
    {
        $client->update($request->all());
        return redirect()->route('store')->with('success', 'Actualizado con Exito');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('success', 'Eliminado con Exito');
    }

    public function export()
    {
        return Excel::download(new ClientExport, 'Clientes.xlsx');
    }
}
