<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HR\EmployeeGroupRequest;
use App\Models\Employee;

class HRgroupController extends Controller
{
     public function index()
     {
         return view('HR.employee.index');
     }
    public function CreateGroup(EmployeeGroupRequest $req)
    {
       $employee = Employee::where('employee_id',$req->employee_id)->value('employee_group');
        if($employee == 'N/A')
        {
            $employee1 = Employee::where('employee_id', $req->employee_id)->first();
            $employee1->employee_group = $req->employee_group;
            $employee1->save();          
        }
        $req->session()->flash('msg','Employee added to group Successfully');
        return redirect()->route('HRemployee.emplist');

    }
}
