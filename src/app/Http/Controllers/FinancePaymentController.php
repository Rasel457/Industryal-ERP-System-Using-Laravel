<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance\PaymentHistory;
use App\Models\Finance\Invoice;
use App\Models\Finance\SalesOrder;
use App\Models\Finance\Asset;
use App\Models\Finance\Expense;
use App\Models\Finance\Liability;
use App\Models\Finance\Bank;
use Carbon\Carbon;
use File;
use DB;
use PDF;

class FinancePaymentController extends Controller
{
    public function index(){
        return view('finance.payments.index');
    }

    public function history(){
        $payment_history = PaymentHistory::where('manager_id',session('id'))->get();
        return view('finance.payments.history')->with('payment_history',$payment_history);
    }

    public function customer(){
        $invoice = Invoice::where('manager_id',session('id'))->where('type','Customer')->where('status','Unadjusted')->get();
        return view('finance.payments.customer')->with('invoices', $invoice);
    }

    public function supplier(){
        $invoice = Invoice::where('manager_id',session('id'))->where('type','Supplier')->where('status','Unadjusted')->get();
        return view('finance.payments.supplier')->with('invoices', $invoice);
    }

    public function customer_adjust($id){
        $invoice = Invoice::where('id',$id)->first();
        $asset = new Asset;
        $asset->type = 'Sales';
        $asset->amount = $invoice->total_amount;
        $asset->manager_id = session('id');
        $asset->save();
        $payment_history = new PaymentHistory;
        $payment_history->type = 'Credit';
        $payment_history->amount = $invoice->total_amount;
        $payment_history->manager_id = session('id');
        $payment_history->save();
        $invoice = Invoice::find($id);
        $invoice->status = 'Adjusted';
        $invoice->save();
        $bank = Bank::where('manager_id',session('id'))->first();
        $update_bank = Bank::find($bank->id);
        $update_bank->balance += $payment_history->amount;
        $update_bank->save();
        return redirect()->route('finance.payments.history');
    }

    public function supplier_adjust($id){
        $invoice = Invoice::where('id',$id)->first();
        $expense = new Expense;
        $expense->type = 'Purchases';
        $expense->amount = $invoice->total_amount;
        $expense->manager_id = session('id');
        $expense->save();
        $payment_history = new PaymentHistory;
        $payment_history->type = 'Debit';
        $payment_history->amount = $invoice->total_amount;
        $payment_history->manager_id = session('id');
        $payment_history->save();
        $invoice = Invoice::find($id);
        $invoice->status = 'Adjusted';
        $invoice->save();
        $liability = new Liability;
        $liability->type = 'Expenses';
        $liability->amount = $payment_history->amount;
        $liability->manager_id = session('id');
        $liability->save();
        $bank = Bank::where('manager_id',session('id'))->first();
        $update_bank = Bank::find($bank->id);
        $update_bank->balance -= $payment_history->amount;
        $update_bank->save();
        return redirect()->route('finance.payments.history');
    }
}
