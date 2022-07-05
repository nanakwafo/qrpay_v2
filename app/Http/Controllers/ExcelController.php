<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
    //unused
    public function exportxlsx($platformId,$qrCodeId='')
    {
        return Excel::download(new TransactionsExport($platformId,$qrCodeId), 'transactions.xlsx');
    }
    public function exportcsv($platformId,$qrCodeId='')
    {
        return Excel::download(new TransactionsExport($platformId,$qrCodeId), 'transactions.csv');
    }
}
