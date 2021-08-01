<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sales\OrderModel;
use App\Models\Sales\CustomerModel;
use App\Http\Requests\Sales\SalesCustomerInsertRequest;
use App\Models\Product\product_table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    public function ordersList()
    {
        $orders = OrderModel::all();
        return view('sales.orders.list')->with('orders', $orders);
    }
    
    public function createOrder()
    {
        return view('sales.orders.create');
    }
    public function existingOrNew(Request $req)
    {
        $id = $req->cus_id;
        // return view('sales.orders.create', ['id' => $id]);
        if(empty($id))
        {
            return view('sales.orders.transactions.confirm');
        }
        else
        {
            $customer = CustomerModel::where('id', $req->cus_id)->first();
            $products = product_table::all();
            if($customer)
            {
                return view('sales.orders.create')->with('id', $customer['id'])->with('first_purchase', $customer['first_purchase'])->with('products', $products);
            }
            else
            {
                return view('sales.orders.transactions.confirm');
            }
        }
    }

    public function transactionsList()
    {
        return view('sales.orders.transactions.list');
    }
    
    // public function createExistingCusOrder(Request $req)
    // {
    //     $customer = CustomerModel::where('id', $req->cus_id)->first();
    //     if($customer)
    //     {
    //         return view("sales.orders.createjjjj");
    //     }
    //     else
    //     {
    //         return view("sales.orders.transactions.existing");
    //     }
    // }

    public function insertNewOrder(Request $req)
    {
        $order = new OrderModel;
        $order->customer_id = $req->cus_id;
        $order->order_description = $req->order_des;
        $order->order_made = Carbon::now()->toDateTimeString();
        $order->total_amount = $req->sum_total;
        $order->status = "processing";
        $order->save();
        $req->session()->flash('successful', 'Successfully added!');
        return redirect()->route('sales.orders.index');
        // return view('ok');
    }
}
