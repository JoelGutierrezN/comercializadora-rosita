<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ClientExport implements FromView
{
    public function view(): View
    {
        return view('exports.clients', [
            'clients' => Client::all()
        ]);
    }
}
