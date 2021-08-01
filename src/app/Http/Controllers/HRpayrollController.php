<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HRpayrollController extends Controller
{
     public function show()
     {
         return view('HR.payroll.createPayroll');
     }
}
