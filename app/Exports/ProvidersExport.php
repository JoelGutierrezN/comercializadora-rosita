<?php

namespace App\Exports;

use App\Models\Provider;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ProvidersExport implements FromView
{
    public function view(): View
    {
        return view('exports.providers', [
            'providers' => Provider::all()
        ]);
    }
}
