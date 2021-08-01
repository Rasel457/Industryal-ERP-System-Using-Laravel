<?php

namespace App\Exports\Sales;

use App\Models\Sales\CustomerModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CustomerModel::all();
    }
}
