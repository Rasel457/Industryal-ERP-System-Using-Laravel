<?php

namespace App\Exports;

use App\Models\Product\warehouse_table;
use Maatwebsite\Excel\Concerns\FromCollection;

class WarehouseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return warehouse_table::all();
    }
}
