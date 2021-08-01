<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Finance\BankRequest;
use App\Http\Requests\Finance\BudgetRequest;
use App\Models\Finance\Asset;
use App\Models\Finance\Expense;
use App\Models\Finance\Liability;
use App\Models\Finance\Bank;

class FinanceBudgetingController extends Controller
{
    public function index(){
        return view('finance.budgeting.index');
    }
    public function index_connectedbanks(){
        $bank = Bank::where('manager_id',session('id'))->get();
        return view('finance.budgeting.connectedbanks')->with('banks',$bank);
    }
    public function index_newbank(){
        return view('finance.budgeting.newbank');
    }

    public function index_expense(){
        return view('finance.budgeting.expense');
    }
    public function index_asset(){
        return view('finance.budgeting.asset');
    }
    public function index_liability(){
        return view('finance.budgeting.liability');
    }

    public function expense(BudgetRequest $req){
        $expense = new Expense;
        $expense->type = $req->type;
        $expense->amount = $req->amount;
        $expense->manager_id = session('id');
        $expense->save();
        $bank = Bank::where('manager_id',session('id'))->first();
        $update_bank = Bank::find($bank->id);
        $update_bank->balance -= $req->amount;
        $update_bank->save();
        return redirect()->route('finance.budgeting.expense');
    }
    public function asset(BudgetRequest $req){
        $asset = new Asset;
        $asset->type = $req->type;
        $asset->amount = $req->amount;
        $asset->manager_id = session('id');
        $asset->save();
        $bank = Bank::where('manager_id',session('id'))->first();
        $update_bank = Bank::find($bank->id);
        $update_bank->balance += $req->amount;
        $update_bank->save();
        return redirect()->route('finance.budgeting.asset');
    }
    public function liability(BudgetRequest $req){
        $liability = new Liability;
        $liability->type = $req->type;
        $liability->amount = $req->amount;
        $liability->manager_id = session('id');
        $liability->save();
        $bank = Bank::where('manager_id',session('id'))->first();
        $update_bank = Bank::find($bank->id);
        $update_bank->balance -= $req->amount;
        $update_bank->save();
        return redirect()->route('finance.budgeting.liability');
    }

    public function newbank(BankRequest $req){
        $bank = new Bank;
        $bank->name = $req->name;
        $bank->holder_name = $req->holder_name;
        $bank->balance = $req->balance;
        $bank->account_no = $req->account_no;
        $bank->manager_id = session('id');
        $bank->save();
        return redirect()->route('finance.budgeting.connectedbanks');
    }

    public function disconnect($id){
        Bank::destroy($id);
        return redirect()->route('finance.budgeting.connectedbanks');
    }
}
