<?php

namespace App\Exports;

use App\Models\Entry;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EntriesExport implements FromView
{
    public function view(): View
    {
        return view('exports.entries', [
            'entries' => Entry::all()
        ]);
    }
}
