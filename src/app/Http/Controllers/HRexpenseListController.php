<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Exports\ExpenseExport;
use Maatwebsite\Excel\Facades\Excel;

class HRexpenseListController extends Controller
{
    public function list()
    {
        $expenses=Expense::all();
        return view('HR.expense.expenseList')->with('expenseList',$expenses);
    }
    public function expEdit($id)
    {
        $expense = Expense::find($id);
        return view('HR.expense.edit')->with('expense',$expense);
    }
    public function expUpdate(Request $req,$id)
    {
        $expense=Expense::find($id);
        $expense->name=$req->name;
        $expense->catagory=$req->catagory;
        $expense->amount=$req->amount;
        $expense->description=$req->description;
        $expense->expense_date=$req->expense_date;
        
        $expense->save();
        $req->session()->flash('msg','Update Successfully ');
        return redirect()->route('HRexpenseList.list');

    }
    public function expDelete($id)
    {
        $expense=Expense::find($id);
        return view('HR.expense.delete')->with('expense',$expense);
    }

    public function expDestroy($id,Request $req)
    {
        Expense::destroy($id);
        $req->session()->flash('msg','Delete successfully');
        return redirect()->route('HRexpenseList.list');
    }
    public function ExplistExport()
    {
        return Excel::download(new ExpenseExport, 'expense.xlsx');
    }
}
