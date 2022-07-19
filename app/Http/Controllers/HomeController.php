<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function __invoke()
    {
        $offers = Product::latest()->take(6)->get();
        $products = Product::latest()->paginate(19);
        return view('home.index', compact('offers', 'products'));
    }
}
