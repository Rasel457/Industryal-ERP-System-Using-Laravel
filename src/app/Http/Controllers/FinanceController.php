<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance\User;
use App\Models\Organization;

class FinanceController extends Controller
{
    public function index_dashboard(){
        $user_finance = User::where('id',session('id'))->first();
        $user_sales = User::where('organization_id',$user_finance->organization_id)->where('type','sales')->first();
        $user_product = User::where('organization_id',$user_finance->organization_id)->where('type','product')->first();
        $user_hr = User::where('organization_id',$user_finance->organization_id)->where('type','hr')->first();
        $organization = Organization::where('id',$user_finance->organization_id)->first();
        return view('finance.dashboard.index')->with('organization', $organization)
        ->with('user_finance',$user_finance)
        ->with('user_sales',$user_sales)
        ->with('user_product',$user_product)
        ->with('user_hr',$user_hr);
    }
}
