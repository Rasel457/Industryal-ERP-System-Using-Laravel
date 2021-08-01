<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceChatController extends Controller
{
    public function index(){
        return view('finance.chat.index');
    }
}
