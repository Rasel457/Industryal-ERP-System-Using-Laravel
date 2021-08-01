<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\product_table;
use App\Models\Product\warehouse_table;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Exports\GoodProductExport;
use App\Exports\FaultyProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product\activities_table;

class ProductListController extends Controller
{
    public function index(Request $req)
    {
        $list = product_table::all();
        return view('product.list.index')->with('productList', $list);
    }

    public function deleteProduct($id)
    {
        $product = product_table::where('id', $id)->first();
        return view('product.list.details')->with('product', $product);
    }

    public function destroyProduct($id)
    {
        $product = product_table::where('id', $id)->first();
        $img_path = "upload/Product/".$product['image'];
        if(File::exists($img_path)) 
        {
            File::delete($img_path);
        }
        product_table::where('id', $id)->delete();

        // activity
        $activity = new activities_table;
        $activity->type = "Delete Product";
        $activity->description = "Id: ".$id."\r\n"."Product Name: ".$product->product_name;
        $activity->activity_time = date("Y-m-d H:i:s");
        $activity->save();

        return redirect()->route('productList.index');
    }

    public function editProduct($id)
    {
        $product = product_table::where('id', $id)->first();
        $warehouseList = warehouse_table::pluck('name');
        return view('product.list.edit')->with('product', $product)->with('warehouseList',$warehouseList);
    }

    public function updateProduct(ProductCreateRequest $req,$id)
    {
         $img = $req->file('product_image');
         $product = product_table::where('id', $id)->first();
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
         $product->product_condition = $req->product_condition;
         $product->last_updated = date('Y-m-d');
         $product->image = $req->product_id.'.'.$img->getClientOriginalExtension();
         $img->move('upload/Product', $req->product_id.'.'.$img->getClientOriginalExtension());
         $product->save();

         // activity
        $activity = new activities_table;
        $activity->type = "Update Product";
        $activity->description = "Product Id: ".$req->product_id.", "."Product Name: ".$req->product_name;
        $activity->activity_time = date("Y-m-d H:i:s");
        $activity->save();

        return redirect()->route('productList.index');
    }

    public function faulty()
    {
        $list = product_table::all();
        return view('product.list.faulty')->with('productList', $list);
    }

    public function exportGoodProduct()
    {
        return Excel::download(new GoodProductExport, 'goodProduct_details.xlsx');
    }

    public function exportFaultyProduct()
    {
        return Excel::download(new FaultyProductExport, 'faultyProduct_details.xlsx');
    }

    public function search(Request $req)
    {
        $product = product_table::where('product_name','like','%'.$req->get('searchQuery').'%')->where('product_condition',"Good")->get();
        return json_encode($product);
    }
}
