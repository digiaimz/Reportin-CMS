<?php

namespace App\Imports;

use App\District;
use App\Tehsil;
use App\Zone;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportView implements FromView
{
    public function view(): View
    {
        return view('export.view');
    }
}
