<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\TransferProductRequest;
use App\Models\Product\warehouse_table;
use App\Models\Product\product_table;
use App\Models\Product\activities_table;

class ProductTransferController extends Controller
{
    public function index()
    {
        $warehouse = warehouse_table::all();
        return view('product.transfer.index')->with('warehouseList', $warehouse);
    }

    public function transfer(TransferProductRequest $req)
    {
        $product = product_table::where('product_id', $req->product_id)->first();
        $warehouseQuantity = warehouse_table::where('name', $req->warehouse)->value('quantity');
        $productQuantity = product_table::where('product_id', $req->product_id)->value('stock');

        if(!$product)
        {
            $req->session()->flash('msg', "Oops! Product Not Found");
            return back();
        }
        elseif($req->product_quantity > $warehouseQuantity)
        {
            $req->session()->flash('wmsg', "Oops! Warehouse doesn't have that much quantity to store");
            return back();
        }
        elseif($req->product_quantity > $productQuantity)
        {
            $req->session()->flash('qmsg', "Oops! You don't have that much product");
            return back();
        }
        elseif($req->warehouse == $product->warehouse_name)
        {
            $req->session()->flash('curr_msg', "Oops! You selected the current warehouse");
            return back();
        }
        else
        {
            // Decrease current product stock from current warehouse
            $product = product_table::where('product_id', $req->product_id)->first();
            $prev_warehouse_name = $product->warehouse_name;
            $prev_warehouse_quantity = $product->stock - doubleval($req->product_quantity);
            $product->stock = $product->stock - doubleval($req->product_quantity);
            $product->save();

            //Add transfer quantity to as a new product
            $newProduct = new product_table;
            $newProduct->product_id = $product->product_id;
            $newProduct->product_name = $product->product_name;
            $newProduct->status_sell = $product->status_sell;
            $newProduct->status_purchase = $product->status_purchase;
            $newProduct->product_description = $product->product_description;
            $newProduct->warehouse_name = $req->warehouse;
            $newProduct->stock = doubleval($req->product_quantity);
            $newProduct->nature = $product->nature;
            $newProduct->weight = $product->weight;
            $newProduct->weight_unit = $product->weight_unit ;
            $newProduct->dimention = $product->dimention;
            $newProduct->dimention_unit = $product->dimention_unit;
            $newProduct->selling_price = $product->selling_price;
            $newProduct->tax = $product->tax;
            $newProduct->image = $product->image;
            $newProduct->product_condition = "Good";
            $newProduct->date_added = date("Y-m-d");
            $newProduct->last_updated = date("Y-m-d");
            $newProduct->save();

            // Increase previous warehouse quantity
            $prev_warehouse = warehouse_table::where('name', $prev_warehouse_name)->first();
            $prev_warehouse->remaining_quantity += $prev_warehouse_quantity;
            $prev_warehouse->save();

            // Decrease new warehouse quantity
            $new_warehouse = warehouse_table::where('name', $req->warehouse)->first();
            $new_warehouse->remaining_quantity -= $req->product_quantity;
            $new_warehouse->save();

            // activity
            $activity = new activities_table;
            $activity->type = "Transfer Product";
            $activity->description = "Product Id: ".$product->product_id.", "."Product Name: ".$product->product_name.", "."From Warehouse: ".$product->warehouse_name.", "."To Warehouse: ".$req->warehouse.", "."Quantity: ".$req->product_quantity;
            $activity->activity_time = date("Y-m-d H:i:s");
            $activity->save();

            $req->session()->flash('transfer_success', "Prodcut Successfully Transfered!");
            return redirect()->route('productTransfer.index');
        }
    }
}
