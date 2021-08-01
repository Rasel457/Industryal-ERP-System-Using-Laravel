<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesStatsController extends Controller
{
    public function statsIndex()
    {
        return view('sales.stats.index');
    }
    public function viewStatus(){
        return view('sales.stats.analytics.status');
    }
    public function viewForecast(){
        return view('sales.stats.analytics.forecast');
    }
    public function viewRevenue(){
        return view('sales.stats.analytics.revenue');
    }
}
