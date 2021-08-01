<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Requests\Sales\SalesCustomerUpdateRequest;
use App\Http\Requests\Sales\SalesCustomerInsertRequest;
use Illuminate\Http\Request;
use App\Models\Sales\CustomerModel;

class SalesCustomerController extends Controller
{
    public function showCustomersList()
    {
        $customers = CustomerModel::all();
        return view('sales.customers.list')->with('customers', json_decode($customers, true));
    }

    public function sendEmail($id)
    {
        return view('sales.mail.send');
    }

    public function editCustomer($id)
    {
        $customer = CustomerModel::where('id', $id)->first();
        return view('sales.customers.update')->with('customer', $customer);
    }

    public function updateCustomer(SalesCustomerUpdateRequest $req,$id) 
    {
        $customer = CustomerModel::where('id', $id)->first();
        $customer->name = $req->cus_name;
        $customer->email = $req->cus_email;
        $customer->phone = $req->cus_phone;
        $customer->delivery_point = $req->cus_del;
        $customer->updated_at = date('Y-m-d');
        $customer->save();
        $req->session()->flash('successful', 'Successfully updated!');
        return redirect()->route('sales.customers.list');
    }

    public function createCustomer() 
    {
        // $lastCustomer = DB::table('customers')->latest('id')->first();
        $statement = DB::select("SHOW TABLE STATUS LIKE 'customers'");
        $nextId = $statement[0]->Auto_increment;
        return view('sales.customers.create')->with('id', $nextId);
    }

    public function insertCustomer(SalesCustomerInsertRequest $req) 
    {
        $customer = new CustomerModel;
        $customer->name = $req->cus_name;
        $customer->email = $req->cus_email;
        $customer->phone = $req->cus_phone;
        $customer->type = "regular";
        $customer->delivery_point = $req->cus_del;
        $customer->updated_at = date('Y-m-d');
        $customer->first_purchase = date('Y-m-d');
        $customer->save();
        $req->session()->flash('successful', 'Successfully updated!');
        return redirect()->route('sales.customers.list');
    }

    
}
