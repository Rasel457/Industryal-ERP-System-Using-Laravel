<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\product_table;

class ProductStatisticsController extends Controller
{
    public function index()
    {
        $allData = $this->chartInformation();
        $chartData = $allData['chartData'];
        $productPriceChartData = $allData['productPriceChartData'];
        
        return view('product.statistics.index')->with('chartData',$chartData)
                                               ->with('productPriceChartData', $productPriceChartData);
    }

    public function downloadStatisticsPDF()
    {
        $allData = $this->chartInformation();
        $chartData = $allData['chartData'];
        $warehouseChartData = $allData['warehouseChartData'];
        $productPriceChartData = $allData['productPriceChartData'];
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('product.statistics.pdf')->with('chartData',$chartData)
                                                        ->with('warehouseChartData', $warehouseChartData)
                                                        ->with('productPriceChartData', $productPriceChartData));

        //(Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('product_statistics.pdf');

    }

    public function chartInformation()
    {
        // Product chart
        $products = product_table::all();
        $allProducts = array(); // all types of products
        foreach($products as $item)
        {
            $currProduct = $item->product_name;
            $check = FALSE; 
            foreach($allProducts as $product)
            {
                if($product == $currProduct)
                {
                    $check = TRUE;
                    break;
                }
            }
            if(!$check)
            {
                array_push($allProducts,$currProduct);  
            }
        }

        $productCnt = []; // product wise stock
        foreach($allProducts as $currProduct)
        {
            $cnt = 0;
            foreach($products as $item)
            {
                if($item->product_name == $currProduct)
                {
                    $cnt += $item->stock;
                }
            }
            $productCnt += [$currProduct => $cnt];
        }

        $chartData = ""; // for rendering in chart
        foreach($productCnt as $x => $x_value)
        {
            $chartData .= "['".$x."',".$x_value."],";
        }
        $chartData = rtrim($chartData,",");


        // Column Chart, Product - Price
        $productPrice = []; // product wise price
        foreach($allProducts as $currProduct)
        {
            $cnt = 0;
            foreach($products as $item)
            {
                if($item->product_name == $currProduct)
                {
                    $cnt += $item->selling_price;
                }
            }
            $productPrice += [$currProduct => $cnt];
        }
        asort($productPrice);
        $productPriceChartData = ""; // for rendering in chart
        foreach($productPrice as $x => $x_value)
        {
            $productPriceChartData .= "['".$x."',".$x_value."],";
        }
        $productPriceChartData = rtrim($productPriceChartData,",");

        return ["chartData" => $chartData, "productPriceChartData" => $productPriceChartData]; 
    }
}
