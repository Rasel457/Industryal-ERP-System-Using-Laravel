<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\warehouse_table;

class WarehouseStatisticsController extends Controller
{
    public function index()
    {
        $allData = $this->chartInformation();
        $warehouseData = $allData['warehouseChartData'];
        $warehouseCountryData = $allData['warehouseCountryData'];
        return view('product.warehouse.statistics.index')->with('warehouseData',$warehouseData)->with('warehouseCountryData', $warehouseCountryData);
    }

    public function chartInformation()
    {
        // Warehouse chart
        $warehouses = warehouse_table::all();
        $warehouseCnt = []; // warehouse wise remaining quantity
        foreach($warehouses as $item)
        {
            $currWarehouse = $item->name;
            $currWarehouseQuantity = $item->remaining_quantity;
            $warehouseCnt += [$currWarehouse => $currWarehouseQuantity];
        }

        $warehouseChartData = ""; // for rendering in chart
        foreach($warehouseCnt as $x => $x_value)
        {
            $warehouseChartData .= "['".$x."',".$x_value."],";
        }
        $warehouseChartData = rtrim($warehouseChartData,",");


        // Warehouse country chart
        $allWarehouses = array(); // all warehouse array
        foreach($warehouses as $item)
        {
            $currWarehouses = $item->name;
            $check = FALSE; 
            foreach($allWarehouses as $warehouse)
            {
                if($warehouse == $currWarehouses)
                {
                    $check = TRUE;
                    break;
                }
            }
            if(!$check)
            {
                array_push($allWarehouses,$currWarehouses);  
            }
        }

        $warehouseCountryCnt = []; // country wise warehouse count
        foreach($allWarehouses as $currWarehouses)
        {
            $cnt = 0;
            foreach($warehouses as $item)
            {
                if($item->name == $currWarehouses)
                {
                    $cnt++;
                }
            }
            $warehouseCountryCnt += [$currWarehouses => $cnt];
        }
        $warehouseCountryData = ""; // for rendering in chart
        foreach($warehouseCountryCnt as $x => $x_value)
        {
            $warehouseCountryData .= "['".$x."',".$x_value."],";
        }
        $warehouseCountryData = rtrim($warehouseCountryData,",");

        return ["warehouseChartData" => $warehouseChartData, "warehouseCountryData" => $warehouseCountryData]; 
    }
}
