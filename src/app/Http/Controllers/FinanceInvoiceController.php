<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Finance\InvoiceRequest;
use App\Models\Finance\ImportExport;
use App\Models\Finance\Invoice;
use App\Models\Finance\SalesOrder;
use App\Models\Finance\Leave;
use App\Models\Finance\Expense;
use Carbon\Carbon;
use File;
use DB;
use PDF;

class FinanceInvoiceController extends Controller
{
    public function index_invoice(){
        return view('finance.invoice.index');
    }
    public function index_invoice_listcustomer(){
        $invoice = Invoice::where('manager_id',session('id'))->where('type','Customer')->get();
        return view('finance.invoice.listcustomer')->with('invoices', $invoice);
    }
    public function index_invoice_listsupplier(){
        $invoice = Invoice::where('manager_id',session('id'))->where('type','Supplier')->get();
        return view('finance.invoice.listsupplier')->with('invoices', $invoice);
    }

    public function index_invoice_newcustomer(){
        $salesorders = SalesOrder::where('status','Unadjusted')->where('type','Credit')->get();
        return view('finance.invoice.customer')->with('salesorders', $salesorders);
    }
    public function index_invoice_newsupplier(){
        $salesorders = SalesOrder::where('status','Unadjusted')->where('type','Debit')->get();
        return view('finance.invoice.supplier')->with('salesorders', $salesorders);
    }

    public function invoice_newcustomer(InvoiceRequest $req){
        $invoice = new Invoice;
        $invoice->title = $req->title;
        $invoice->for_name = $req->name;
        $invoice->sales_order_id = $req->order;
        $invoice->status = 'Unadjusted';
        $invoice->type = 'Customer';
        $invoice->manager_id = session('id');
        $invoice->file = uniqid() . '_INVOICE.pdf';
        $salesorder = SalesOrder::where('id',$req->order)->first();
        $invoice->total_amount = $salesorder->total_amount;
        $pdf = PDF::loadView('finance.invoice.details', array('for_name' => $invoice->for_name,'title' => $invoice->title,'date'=>Carbon::now(),'desc'=>$salesorder->order_description,'amount'=>$salesorder->total_amount,'type'=>$invoice->type));
        File::put(public_path('upload/Finance/Invoices/'.$invoice->file), $pdf->output());
        $invoice->save();
        return redirect()->route('finance.invoice.customer');
    }
    public function invoice_newsupplier(InvoiceRequest $req){
        $invoice = new Invoice;
        $invoice->title = $req->title;
        $invoice->for_name = $req->name;
        $invoice->sales_order_id = $req->order;
        $invoice->status = 'Unadjusted';
        $invoice->type = 'Supplier';
        $invoice->manager_id = session('id');
        $invoice->file = uniqid() . '_INVOICE.pdf';
        $salesorder = SalesOrder::where('id',$req->order)->first();
        $invoice->total_amount = $salesorder->total_amount;
        $pdf = PDF::loadView('finance.invoice.details', array('for_name' => $invoice->for_name,'title' => $invoice->title,'date'=>Carbon::now(),'desc'=>$salesorder->order_description,'amount'=>$salesorder->total_amount,'type'=>$invoice->type));
        File::put(public_path('upload/Finance/Invoices/'.$invoice->file), $pdf->output());
        $invoice->save();
        return redirect()->route('finance.invoice.supplier');
    }
    public function delete($id){
        Invoice::destroy($id);
        return redirect()->route('finance.invoice.index');
    }
}
