<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Support\Facades\Storage;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function index()
    {
        $providers = Provider::orderBy('id', 'desc')->get();

        if ($providers->count() == 0) {
            return redirect()->route('providers.index')->with('error', 'Primero debes crear un proveedor');
        }

        $products = Product::orderBy('id', 'desc')->paginate(15);
        $active_products = Product::where('status', '1');
        $inactive_products = Product::where('status', '0');
        $wholesale_products = Product::where('wholesale', '1');

        return view('products.index', compact(
            'products',
            'providers',
            'active_products',
            'inactive_products',
            'wholesale_products'
        ));
    }

    public function store(ProductRequest $request)
    {
        $product = (new Product)->fill($request->all());

        if($request->hasFile('photo')){
            $product->photo = $request->file('photo')->store('products', 'public');
        }

        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect()->route('products.index')->with('success', 'El producto se creo con exito!');
    }

    public function edit(Product $product)
    {
        $providers = Provider::all();

        return view('products.edit', compact('product', 'providers'));
    }


    public function update(ProductEditRequest $request, Product $product)
    {

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($product->photo);
            $product->photo = $request->file('photo')->store('products', 'public');
        }

        $product->update($request->except('photo'));

        return redirect()->route('products.index')->with('success', 'El producto se actualizo con exito!');
    }

    public function destroy(Product $product)
    {
        if($product->photo){
            Storage::disk('public')->delete($product->photo);
        }
        $product->delete();
        return back()->with('success', 'El producto se elimino con exito');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'productos.xlsx');
    }
}
