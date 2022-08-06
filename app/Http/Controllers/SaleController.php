<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Entry;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\TemporatySale;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('sales.create', compact('clients'));
    }

    public function show(Sale $sale)
    {
        $clients = Client::all();
        $products = Product::orderBy('id', 'desc')->get();
        $temporary = TemporatySale::where('status', '0')->get();
        return view('sales.show', compact('clients', 'products', 'temporary', 'sale'));
    }

    public function getClient(Request $request)
    {
        $data = Client::findOrFail($request->client);
        return $data;
    }

    public function saleDelete(Sale $sale)
    {
        $sale->update(['status' => '3']);
        return back();
    }

    public function saleReport(Sale $sale)
    {
        $pdf = \PDF::loadView('pdf.sale-index', compact('sale'))->setPaper('commercial #10 envelope', 'landscape');
        // // $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->loadview('pdf.sale-index', compact('sale', 'details'));
        return $pdf->stream('sale.pdf');
        //return view('pdf.sale-index', compact('sale'));
    }

    public function getProductByCode(Request $request)
    {

        $product = Product::where('code', $request->code)->first();

        if (!$product) {
            return response(['error' => true, 'message' => 'El producto no se encontro'], 404);
        }

        if ($product->stock < 1) {
            return response(['error' => true, 'message' => 'No hay productos en stock'], 404);
        }

        $product->update(['stock' => $product->stock - 1]);
        return response(['product' => $product], 200);
    }

    public function createNewSale(Request $request)
    {
        $pricesData = $request->pricesData;
        $pricesData = json_decode($pricesData);
        $client = json_decode($request->client, true);
        $products = json_decode($request->products);

        foreach($products as $product){
            $selledProduct = Product::find($product->product->id);
            $selledProduct->stock -= $product->quantity;
            $selledProduct->save();

            $newEntry = new Entry();
            $newEntry->entry = 0;
            $newEntry->provider_id = $product->product->provider_id;
            $newEntry->product_id = $product->product->id;
            $newEntry->pcs = $product->quantity;
            $newEntry->save();
        }

        $sale = Sale::create([
            'user_id' => auth()->user()->id,
            'client_id' => $client ? $client['id'] : null,
            'status' => 2,
            'products' => $request->products,
            'subtotal' => $pricesData->subTotal,
            'discount' => $pricesData->discount,
            'total' => $pricesData->total,
        ]);

        return response(['product' => $sale, 'message' => 'La venta se creo con exito'], 200);
    }

    public function deleteProduct(Request $request)
    {

        $product = Product::findOrFail($request->id);

        if (!$product) {
            return response(['error' => true, 'message' => 'El producto no se encontro'], 404);
        }

        $product->update(['stock' => $product->stock + $request->quantity]);
        return response(['message' => 'El producto se elimino con exito'], 200);
    }

    public function cancelSales(Request $request)
    {
        $data = $request->sale;
        foreach ($data as $item) {
            $product = Product::findOrFail($item['product']['id']);
            $product->update(['stock' => $product->stock + $item['quantity']]);
            return response(['message' => 'La venta se cancelo con exito'], 200);
        }
    }
}
