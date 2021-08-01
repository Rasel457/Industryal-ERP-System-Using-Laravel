<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HR\expenseReportRequest;
use App\Models\Expense;

class HRexpenseController extends Controller
{
    public function report()
    {
        return view('HR.expense.expenseReport');
    }
    public function create(expenseReportRequest $req)
    {
        $expense=new Expense;
        $expense->name=$req->name;
        $expense->catagory=$req->catagory;
        $expense->amount=$req->amount;
        $expense->description=$req->description;
        $expense->expense_date=$req->expense_date;
        
        $expense->save();
        $req->session()->flash('msg','Successfully Insert');
        return redirect()->route('HRexpenseList.list');
    }
}
