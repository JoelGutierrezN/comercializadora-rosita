<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ProductsExport implements FromView
{
    public function view(): View
    {
        return view('exports.products', [
            'products' => Product::all()
        ]);
    }
}
