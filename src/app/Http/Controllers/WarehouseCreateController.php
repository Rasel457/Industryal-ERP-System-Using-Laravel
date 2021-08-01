<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\WarehouseCreateRequest;
use App\Models\Product\warehouse_table;
use App\Models\Product\activities_table;

class WarehouseCreateController extends Controller
{
    public function index()
    {
        return view('product.warehouse.create.index');
    }

    public function create(WarehouseCreateRequest $req)
    {
        $warehouse = new warehouse_table;

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
        $warehouse->remaining_quantity = $req->warehouse_quantity;
        $warehouse->date_added = date('Y-m-d');
        $warehouse->last_updated = date('Y-m-d');   
        $warehouse->save();

        // activity
        $activity = new activities_table;
        $activity->type = "Create Warehouse";
        $activity->description = "Warehouse Id: ".$req->warehouse_id.", "."Warehouse Name: ".$req->warehouse_name;
        $activity->activity_time = date("Y-m-d H:i:s");
        $activity->save();


        // strore into json
        //Get file path
        $file_path = storage_path().'/Product/warehouseList.json';

        //Load the file
        $contents = file_get_contents($file_path);

        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);

        //Get size of contentsDecoded
        $len = sizeof($contentsDecoded['warehouseList']);

        //Create variables.
        if($len) $contentsDecoded['warehouseList'][$len]['id']  = $len+1;
        else $contentsDecoded['warehouseList'][$len]['id']  = $len;
        $contentsDecoded['warehouseList'][$len]['warehouse_id']  = $req->warehouse_id;
        $contentsDecoded['warehouseList'][$len]['name'] = $req->warehouse_name;
        $contentsDecoded['warehouseList'][$len]['description'] = $req->warehouse_description;
        $contentsDecoded['warehouseList'][$len]['address'] = $req->warehouse_address;
        $contentsDecoded['warehouseList'][$len]['zip_code'] = $req->warehouse_zip_code;
        $contentsDecoded['warehouseList'][$len]['city'] = $req->warehouse_city;
        $contentsDecoded['warehouseList'][$len]['country'] = $req->warehouse_country;
        $contentsDecoded['warehouseList'][$len]['phone'] = $req->warehouse_phone;
        $contentsDecoded['warehouseList'][$len]['quantity'] = $req->warehouse_quantity;
        $contentsDecoded['warehouseList'][$len]['remaining_quantity'] = $req->warehouse_quantity;
        $contentsDecoded['warehouseList'][$len]['status'] = $req->warehouse_status;
        $contentsDecoded['warehouseList'][$len]['date_added'] = date('Y-m-d');
        $contentsDecoded['warehouseList'][$len]['last_updated'] = date('Y-m-d');

        //Encode the array back into a JSON string.
        $json = json_encode($contentsDecoded);

        //Save the file.
        file_put_contents($file_path, $json);


        return redirect()->route('warehouseList.index');
    }
}
