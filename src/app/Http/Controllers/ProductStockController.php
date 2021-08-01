<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\product_table;

class ProductStockController extends Controller
{
    public function index(Request $req)
    {
        $productList = product_table::where('product_condition',"Good")->get();
        return view('product.stocks.index')->with('productList', $productList);
    }

    public function search(Request $req)
    {
        $product = product_table::where('product_name','like','%'.$req->get('searchQuery').'%')->where('product_condition',"Good")->get();
        return json_encode($product);
    }
}
