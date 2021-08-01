<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HR\HRempCreateRequest;
use App\Models\Employee;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class HRemployeeController extends Controller
{
    public function create()
    {
        return view('HR.employee.employeeCreate');
    }

    public function emplist(Request $req)
    {
        if($req->searchEmployee)
        {
            $searchEmp=Employee::where('employee_name',$req->searchEmployee)->get();
            return view('HR.employee.employeeList')->with('employeeList', $searchEmp);
        }
        else
        {
            $employees=Employee::all();
            return view('HR.employee.employeeList')->with('employeeList', $employees);
        }
        
    }
    public function index(HRempCreateRequest $req)
    {
        $employee=new Employee;
        $employee->employee_id=$req->employee_id;
        $employee->employee_name=$req->employee_name;
        $employee->gender=$req->gender;
        $employee->supervisor=$req->supervisor;
        $employee->present_address=$req->present_address;
        $employee->phone=$req->phone;
        $employee->job_position=$req->job_position;
        $employee->employee_group="N/A";
        $employee->start_time=$req->start_time;
        $employee->end_time=$req->end_time;
        $employee->hour_worked=$req->hour_worked;
        $employee->employment_start_date=$req->employment_start_date;
       
        $employee->save();
        $req->session()->flash('msg','Employee create successfully');
        return redirect()->route('HRemployee.emplist');
    }
    public function empEdit($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->first();
        return view('HR.employee.employeeListEdit')->with('employee',$employee);
    }
    public function empUpdate(HRempCreateRequest $req,$employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->first();
        $employee->employee_id=$req->employee_id;
        $employee->employee_name=$req->employee_name;
        $employee->gender=$req->gender;
        $employee->supervisor=$req->supervisor;
        $employee->present_address=$req->present_address;
        $employee->phone=$req->phone;
        $employee->job_position=$req->job_position;
        $employee->start_time=$req->start_time;
        $employee->end_time=$req->end_time;
        $employee->hour_worked=$req->hour_worked;
        $employee->employment_start_date=$req->employment_start_date;
       
        $employee->save();
        $req->session()->flash('msg','Update successfully');
        return redirect()->route('HRemployee.emplist');

    }
    public function empDelete($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->first();
        return view('HR.employee.employeeDelete')->with('employee',$employee);
    }
    public function empDestroy($employee_id,Request $req)
    {
        
        Employee::where('employee_id', $employee_id)->delete();
        $req->session()->flash('msg','Delete successfully');
        return redirect()->route('HRemployee.emplist');


    }
    public function EmpListExport()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }
    
}
