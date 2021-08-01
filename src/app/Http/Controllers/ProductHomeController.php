<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\product_table;
use App\Models\Product\warehouse_table;

class ProductHomeController extends Controller
{
    public function index()
    {
        $products = product_table::all();
        $max_stocked_product = "";
        $max_stocked = -1;
        $most_expensive_product = "";
        $most_expensive = -1;
        $good_products_cnt = 0;
        $faulty_products_cnt = 0;
        foreach($products as $product)
        {
            if($product->stock > $max_stocked)
            {
                $max_stocked = $product->stock;
                $max_stocked_product =  $product->product_name;
            }
            if($product->selling_price > $most_expensive)
            {
                $most_expensive = $product->selling_price;
                $most_expensive_product = $product->product_name;
            }
            if($product->product_condition == "Good")
            {
                $good_products_cnt++;
            }
            if($product->product_condition == "Faulty")
            {
                $faulty_products_cnt++;
            }
        }


        return view('product.home.index')->with('max_stocked_product',$max_stocked_product)
                                         ->with('most_expensive_product', $most_expensive_product)
                                         ->with('good_products_cnt', $good_products_cnt)
                                         ->with('faulty_products_cnt', $faulty_products_cnt);
    }
}
