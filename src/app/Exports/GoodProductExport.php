<?php

namespace App\Exports;

use App\Models\Product\product_table;
use Maatwebsite\Excel\Concerns\FromCollection;

class GoodProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return product_table::all()->where('product_condition', "Good");
    }
}
