<?php

namespace App\Http\Controllers;

use App\Models\Finance\Leave;
use App\Models\Finance\User;
use Illuminate\Http\Request;
class SalesProfileController extends Controller
{
    public function profileIndex(){
        return view('sales.profile.details.index');
    }

    public function editProfile(){
        return view('sales.profile.edit.edit');
    }

    public function updatePassword(){
        return view('sales.profile.edit.password');
    }

    // leave request
    public function leave()
    {
        return view('product.user.leave.index');
    }
    public function verifyLeave(Request $req)
    {
        $leave_type = $req->leave_type;
        $leave_start_date = $req->leave_start_date;
        $leave_end_date = $req->leave_end_date;
        $leave_description = $req->leave_description;

        $username = $req->session()->get('username');
        $user = User::where('username', $username)->first();
        $emp_id = $user->id;
        
        $leave = new Request;

        $leave->employee_id = $emp_id;
        $leave->type = $leave_type;
        $leave->request_description = $leave_description;
        $leave->start_time = $leave_start_date;
        $leave->end_time = $leave_end_date;
        $leave->request_made = date("Y-m-d H:i:s");
        $leave->status = "Pending";

        $leave->save();
        $req->session()->flash('msg', 'Leave request sent to HR');
        return back();
    }

    public function myLeave()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        $emp_id = $user->id;
        $listLeave = Leave::where('employee_id', $user->id)->get();
        //print_r($listLeave);
        return view('product.user.leave.mylist')->with('myList',$listLeave);

    }
}
