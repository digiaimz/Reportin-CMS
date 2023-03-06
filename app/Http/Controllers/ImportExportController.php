<?php
namespace App\Http\Controllers;
use App\Exports\BulkExport;
use App\Imports\BulkImport;
use App\Imports\ExportView;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importExportView()
    {
       return view('importexport');
    }
    public function import()
    {
        Excel::import(new BulkImport,request()->file('file'));

        return back();
    }
    public function export()
    {
        return Excel::download(new ExportView, 'invoices.xlsx');
    }
}
