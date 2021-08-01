<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class HREmpScheduleController extends Controller
{
    public function schedule()
    {
        $employees=Employee::all();
        return view('HR.employee.empSchedule')->with('employeeList',$employees);
    }
}
