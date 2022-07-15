<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Client;
use App\Models\Sale;
use App\Models\Store;

class StoreController extends Controller
{

    public function index(){

        $clients = Client::orderBy('id', 'desc')->get();
        $sales = Sale::latest()->paginate(10);

        return view('store.index', compact('clients', 'sales'));
    }

    public function update(StoreRequest $request, Store $store){

        $store->update($request->all());

        return redirect()->back()->with('success', 'Actualizado correctamente');
    }
}
