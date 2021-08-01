<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Finance\LeaveRequest;
use App\Models\Finance\Leave;
use Carbon\Carbon;

class FinanceLeaveRequestController extends Controller
{
    public function index(){
        return view('finance.leaverequest.index');
    }
    public function index_list(){
        $leave = Leave::where('employee_id',session('id'))->get();
        return view('finance.leaverequest.list')->with('leaves',$leave);
    }
    public function index_new(){
        return view('finance.leaverequest.new');
    }
    public function apply(LeaveRequest $req){
        $leave = new Leave;
        $leave->type = $req->type;
        $leave->request_description = $req->request_description;
        $leave->start_time = $req->start_time;
        $leave->end_time = $req->end_time;
        $leave->employee_id = session('id');
        $leave->request_made = Carbon::now();
        $leave->status = 'Pending';
        $leave->save();
        return redirect()->route('finance.leaverequest.list');
    }
    public function delete($id){
        Leave::destroy($id);
        return redirect()->route('finance.leaverequest.list');
    }
}
