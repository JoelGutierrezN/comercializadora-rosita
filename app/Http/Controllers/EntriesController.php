<?php

namespace App\Http\Controllers;

use App\Exports\EntriesExport;
use App\Models\Entry;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EntriesController extends Controller
{

    public function index(){

        $entries = Entry::latest()->paginate(10);

        return view('entries.index', compact('entries'));
    }

    public function create(){

        $providers = Provider::has('products')->latest()->where('status', '1')->get();

        return view('entries.create', compact('providers'));
    }

    public function store(Request $request){

        $product = Product::find($request->product_id);
        $product->stock += $request->pcs;
        $product->save();

        Entry::create($request->all());

        return redirect()->route('entries.index')->with('info', 'Nueva Entrada de Producto Registrada con Exito!!');
    }

    public function export()
    {
        return Excel::download(new EntriesExport, 'Entradas.xlsx');
    }

}
