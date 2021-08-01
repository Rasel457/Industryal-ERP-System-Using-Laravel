<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\warehouse_table;
use App\Models\Product\product_table;
use App\Http\Requests\Product\WarehouseCreateRequest;
use App\Exports\WarehouseExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product\activities_table;

class WarehouseListController extends Controller
{
    public function index(Request $req)
    {
        $warehouse_list = warehouse_table::all();
        return view('product.warehouse.list.index')->with('warehouseList', $warehouse_list);
    }

    public function editWarehouse($id)
    {
        $warehouse = warehouse_table::where('id', $id)->first();
        return view('product.warehouse.list.edit')->with('warehouse', $warehouse);
    }

    public function updateWarehouse(WarehouseCreateRequest $req, $id)
    {
        $warehouse = warehouse_table::where('id', $id)->first();
        $warehouse->warehouse_id = $req->warehouse_id;
        $warehouse->name = $req->warehouse_name;
        $warehouse->description = $req->warehouse_description;
        $warehouse->address = $req->warehouse_address;
        $warehouse->zip_code = $req->warehouse_zip_code;
        $warehouse->city = $req->warehouse_city;
        $warehouse->country = $req->warehouse_country;
        $warehouse->phone = $req->warehouse_phone;
        $warehouse->status = $req->warehouse_status;
        $warehouse->quantity = $req->warehouse_quantity;
        $warehouse->last_updated = date('Y-m-d');
        $warehouse->save();

        // activity
        $activity = new activities_table;
        $activity->type = "Update Warehouse";
        $activity->description = "Id: ".$id.", "."Warehouse Name: ".$req->warehouse_name;
        $activity->activity_time = date("Y-m-d H:i:s");
        $activity->save();

        return redirect()->route('warehouseList.index');
    }

    public function exportWarehouseList()
    {
        return Excel::download(new WarehouseExport, 'warehouse_details.xlsx');
    }

    public function search(Request $req)
    {
        $product = warehouse_table::where('name','like','%'.$req->get('searchQuery').'%')->get();
        return json_encode($product);
    }
}
