<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Finance\ImportRequest;
use App\Models\Finance\ImportExport;
use App\Models\Finance\Asset;
use App\Models\Finance\Liability;
use App\Models\Finance\Invoice;
use App\Models\Finance\Leave;
use App\Models\Finance\Expense;
use Carbon\Carbon;
use File;
use DB;

class FinanceImportExportController extends Controller
{
    public function index(){
        return view('finance.importexport.index');
    }
    public function index_history(){
        $import_history = ImportExport::where('employee_id',session('id'))->get();
        return view('finance.importexport.history')->with('import_history', $import_history);
    }
    public function index_import(){
        return view('finance.importexport.import');
    }
    public function index_export(){
        return view('finance.importexport.export');
    }
    public function export(){
        $data = [
            'finance_import_history' => DB::table('finance_import_history')->select('date','action','employee_id','file')->get()->toArray(),
            'assets' => DB::table('assets')->select('title','type','amount','created_at','updated_at','manager_id')->get()->toArray(),
            'liabilities' => DB::table('liabilities')->select('title','type','amount','created_at','updated_at','manager_id')->get()->toArray(),
            'invoices' => DB::table('invoices')->select('title','type','for_name','created_at','updated_at','status', 'sales_order_id','total_amount','manager_id')->get()->toArray(),
            'leave_request' => DB::table('leave_request')->select('request_description','type','start_time','end_time','request_made','employee_id','status')->get()->toArray(),
            'expenses' => DB::table('expenses')->select('title','type','amount','created_at','updated_at','manager_id')->get()->toArray(),
         ];
        $data = json_encode($data);
        $fileName = uniqid() . '_datafile.json';
        File::put(public_path('upload/Finance/Export/'.$fileName), $data);
        $import_history = new ImportExport;
        $import_history->date = Carbon::now();
        $import_history->action = 'Export';
        $import_history->employee_id = session('id');
        $import_history->file = $fileName;
        $import_history->save();
        return redirect()->route('finance.importexport.history');
    }

    public function import(ImportRequest $req){
        $import_history = new ImportExport;
        $import_history->date = Carbon::now();
        $import_history->action = 'Import';
        $import_history->employee_id = session('id');
        $import_history->file = '';
        $import_history->save();
        $data = File::get($req->file('importfile'));
        $json = json_decode($data, true) ;
        foreach ($json as $table => $rows) {
            DB::table($table)->insert($rows);
        }
        return redirect()->route('finance.importexport.history');
    }
}
