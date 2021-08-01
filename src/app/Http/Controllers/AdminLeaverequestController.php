<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLeaverequestController extends Controller
{
    public function index(){
        return view('common.admin.leaverequests');
    }
}
