<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Models\Product\product_table;
use App\Models\Product\warehouse_table;
use App\Models\Product\activities_table;

class ProductCreateController extends Controller
{
    public function index()
    {
        $warehouseList = warehouse_table::pluck('name');
        return view('product.create.index')->with('warehouseList', $warehouseList);
    }

    public function create(ProductCreateRequest $req)
    {
        $img = $req->file('product_image');

        $product = new product_table;

        $product->product_id = $req->product_id;
        $product->product_name = $req->product_name;
        $product->status_sell = $req->product_sell_status;
        $product->status_purchase = $req->product_purchase_status;
        $product->product_description = $req->product_description;
        $product->warehouse_name = $req->warehouse_name;
        $product->stock = $req->product_stock;
        $product->nature = $req->product_nature;
        $product->weight = $req->product_weight;
        $product->weight_unit = $req->product_weight_unit;
        $product->dimention = $req->product_dimention;
        $product->dimention_unit = $req->product_dimention_unit;
        $product->selling_price = $req->product_selling_price;
        $product->tax = $req->product_selling_tax;
        $product->image = $req->product_id.'.'.$img->getClientOriginalExtension();
        $product->product_condition = "Good";

        $img->move('upload/Product', $req->product_id.'.'.$img->getClientOriginalExtension());
        $product->date_added = date('Y-m-d');
        $product->last_updated = date('Y-m-d');
        $product->save();

        $warehouse = warehouse_table::where('name',$req->warehouse_name)->first();
        $warehouse->quantity = $warehouse->quantity - doubleval($req->product_stock);
        $warehouse->save();


        // activity
        $activity = new activities_table;
        $activity->type = "Create Product";
        $activity->description = "Product Id: ".$req->product_id.", "."Product Name: ".$req->product_name;
        $activity->activity_time = date("Y-m-d H:i:s");
        $activity->save();


        // strore into json
        //Get file path
        $file_path = storage_path().'/Product/productList.json';

        //Load the file
        $contents = file_get_contents($file_path);

        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);

        //Get size of contentsDecoded
        $len = sizeof($contentsDecoded['productList']);

        //Create variables.
        if($len) $contentsDecoded['productList'][$len]['id']  = $len+1;
        else $contentsDecoded['productList'][$len]['id']  = $len;
        $contentsDecoded['productList'][$len]['product_id']  = $req->product_id;
        $contentsDecoded['productList'][$len]['product_name'] = $req->product_name;
        $contentsDecoded['productList'][$len]['status_sell'] = $req->product_sell_status;
        $contentsDecoded['productList'][$len]['status_purchase'] = $req->product_purchase_status;
        $contentsDecoded['productList'][$len]['product_description'] = $req->product_description;
        $contentsDecoded['productList'][$len]['warehouse_name'] = $req->warehouse_name;
        $contentsDecoded['productList'][$len]['stock'] = $req->product_stock;
        $contentsDecoded['productList'][$len]['nature'] = $req->product_nature;
        $contentsDecoded['productList'][$len]['weight'] = $req->product_weight;
        $contentsDecoded['productList'][$len]['weight_unit'] = $req->product_weight_unit;
        $contentsDecoded['productList'][$len]['dimention'] = $req->product_dimention;
        $contentsDecoded['productList'][$len]['dimention_unit'] = $req->product_dimention_unit;
        $contentsDecoded['productList'][$len]['selling_price'] = $req->product_selling_price;
        $contentsDecoded['productList'][$len]['tax'] = $req->product_selling_tax;
        $contentsDecoded['productList'][$len]['image'] = $req->product_id.'.'.$img->getClientOriginalExtension();
        $contentsDecoded['productList'][$len]['product_condition'] = "Good";
        $contentsDecoded['productList'][$len]['date_added'] = date('Y-m-d');
        $contentsDecoded['productList'][$len]['last_updated'] = date('Y-m-d');

        //Encode the array back into a JSON string.
        $json = json_encode($contentsDecoded);

        //Save the file.
        file_put_contents($file_path, $json);
        
        return redirect()->route('productList.index');
    }
}
