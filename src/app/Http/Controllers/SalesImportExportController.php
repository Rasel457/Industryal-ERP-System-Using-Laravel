<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Sales\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

class SalesImportExportController extends Controller
{
    public function exportCustomer()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
