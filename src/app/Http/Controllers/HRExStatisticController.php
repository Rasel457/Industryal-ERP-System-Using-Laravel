<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HRExStatisticController extends Controller
{
    public function statistic()
    {
        $result=DB::select(DB::raw("SELECT sum(amount)as amount,catagory from expenses group by catagory"));
        //dd($result);
         $chartData="";
        foreach($result as $list)
        {
            $chartData.="['".$list->catagory."', ".$list->amount."],";
        }  
        
        $arr['chartData']=rtrim($chartData,",");
        //echo $chartData;
        return view('HR.expense.Statistic',$arr);
    }
}
