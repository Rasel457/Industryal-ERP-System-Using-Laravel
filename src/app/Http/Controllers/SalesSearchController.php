<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sales\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesSearchController extends Controller
{
    public function index()
    {
        return view('search.search');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $orders=DB::table('orders')->where('id','LIKE','%'.$request->search."%")->get();
            if(!($orders->isEmpty()))
            {
                foreach ($orders as $key => $order) {
                    $output.='<tr>'.
                        '<th>'.$order->id.'</th>'.
                        '<td>'.$order->customer_id.'</td>'.
                        '<td>'.$order->order_description.'</td>'.
                        '<td>'.$order->total_amount.'</td>'.
                        '<td>'.$order->order_made.'</td>'.
                        '<td>'.$order->status.'</td>'.
                        '<td>'.$order->delivered_on.'</td>'.
                        '<td align="center">
                            <a class="btn btn-info text-left" href="#">Update</a>
                        </td>'.
                    '</tr>';
                }
                return Response($output);
            }
            elseif($orders->isEmpty())
            {
                return Response("<div style='margin:auto;width:100%;color:rgb(172, 4, 4);'>
                <h4>Looks like the id you entered does not exist!</h4>
              </div>");
            }
        }
    }
}
