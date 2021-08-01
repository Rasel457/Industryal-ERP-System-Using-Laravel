<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes (Finance and Accounting Features)
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['sess', 'finance_type']], function(){
    Route::get('/finance/dashboard', ['as'=>'finance.dashboard.index', 'uses'=>'FinanceController@index_dashboard']);

    #Profile Routes
    Route::get('/finance/profile', ['as'=>'finance.profile.index', 'uses'=>'FinanceProfileController@index']);
    Route::post('/finance/profile', ['as'=>'finance.profile.update', 'uses'=>'FinanceProfileController@update']);

    #Routes for Invoice
    Route::get('/finance/invoice', ['as'=>'finance.invoice.index', 'uses'=>'FinanceInvoiceController@index_invoice']);
    Route::get('/finance/invoice/listcustomer', ['as'=>'finance.invoice.listcustomer', 'uses'=>'FinanceInvoiceController@index_invoice_listcustomer']);
    Route::get('/finance/invoice/listsupplier', ['as'=>'finance.invoice.listsupplier', 'uses'=>'FinanceInvoiceController@index_invoice_listsupplier']);
    Route::get('/finance/invoice/customer', ['as'=>'finance.invoice.customer', 'uses'=>'FinanceInvoiceController@index_invoice_newcustomer']);
    Route::get('/finance/invoice/supplier', ['as'=>'finance.invoice.supplier', 'uses'=>'FinanceInvoiceController@index_invoice_newsupplier']);
    Route::post('/finance/invoice/customer', ['as'=>'finance.invoice.customer_create', 'uses'=>'FinanceInvoiceController@invoice_newcustomer']);
    Route::post('/finance/invoice/supplier', ['as'=>'finance.invoice.supplier_create', 'uses'=>'FinanceInvoiceController@invoice_newsupplier']);
    Route::get('/finance/invoice/{id}', ['as'=>'finance.invoice.delete', 'uses'=>'FinanceInvoiceController@delete']);

    #Routes for Leave-Request
    Route::get('/finance/leaverequest', ['as'=>'finance.leaverequest.index', 'uses'=>'FinanceLeaveRequestController@index']);
    Route::get('/finance/leaverequest/list', ['as'=>'finance.leaverequest.list', 'uses'=>'FinanceLeaveRequestController@index_list']);
    Route::get('/finance/leaverequest/new', ['as'=>'finance.leaverequest.new', 'uses'=>'FinanceLeaveRequestController@index_new']);
    Route::post('/finance/leaverequest/new', ['as'=>'finance.leaverequest.apply', 'uses'=>'FinanceLeaveRequestController@apply']);
    Route::get('/finance/leaverequest/new/{id}', ['as'=>'finance.leaverequest.delete', 'uses'=>'FinanceLeaveRequestController@delete']);

    #Routes for Reports
    Route::get('/finance/reports', ['as'=>'finance.reports.index', 'uses'=>'FinanceReportController@index']);
    Route::get('/finance/reports/financial', ['as'=>'finance.reports.financial', 'uses'=>'FinanceReportController@index_financial']);
    Route::get('/finance/reports/invoice', ['as'=>'finance.reports.invoice', 'uses'=>'FinanceReportController@index_invoice']);
    Route::post('/finance/reports/financial', ['as'=>'finance.reports.genfinancial', 'uses'=>'FinanceReportController@financial']);
    Route::post('/finance/reports/invoice', ['as'=>'finance.reports.geninvoice', 'uses'=>'FinanceReportController@invoice']);

    #Routes for Import/Export
    Route::get('/finance/importexport', ['as'=>'finance.importexport.index', 'uses'=>'FinanceImportExportController@index']);
    Route::get('/finance/importexport/history', ['as'=>'finance.importexport.history', 'uses'=>'FinanceImportExportController@index_history']);
    Route::get('/finance/importexport/import', ['as'=>'finance.importexport.import', 'uses'=>'FinanceImportExportController@index_import']);
    Route::post('/finance/importexport/import', ['as'=>'finance.importexport.importdata', 'uses'=>'FinanceImportExportController@import']);
    Route::get('/finance/importexport/export', ['as'=>'finance.importexport.export', 'uses'=>'FinanceImportExportController@index_export']);
    Route::post('/finance/importexport/export', ['as'=>'finance.importexport.exportdata', 'uses'=>'FinanceImportExportController@export']);

    #Routes for Budgeting
    Route::get('/finance/budgeting', ['as'=>'finance.budgeting.index', 'uses'=>'FinanceBudgetingController@index']);
    Route::get('/finance/budgeting/connectedbanks', ['as'=>'finance.budgeting.connectedbanks', 'uses'=>'FinanceBudgetingController@index_connectedbanks']);
    Route::get('/finance/budgeting/connectedbanks/{id}', ['as'=>'finance.budgeting.disconnect', 'uses'=>'FinanceBudgetingController@disconnect']);
    Route::get('/finance/budgeting/newbank', ['as'=>'finance.budgeting.newbank', 'uses'=>'FinanceBudgetingController@index_newbank']);
    Route::post('/finance/budgeting/newbank', ['as'=>'finance.budgeting.addnewbank', 'uses'=>'FinanceBudgetingController@newbank']);
    Route::get('/finance/budgeting/expense', ['as'=>'finance.budgeting.expense', 'uses'=>'FinanceBudgetingController@index_expense']);
    Route::post('/finance/budgeting/expense', ['as'=>'finance.budgeting.addexpense', 'uses'=>'FinanceBudgetingController@expense']);
    Route::get('/finance/budgeting/asset', ['as'=>'finance.budgeting.asset', 'uses'=>'FinanceBudgetingController@index_asset']);
    Route::post('/finance/budgeting/asset', ['as'=>'finance.budgeting.addasset', 'uses'=>'FinanceBudgetingController@asset']);
    Route::get('/finance/budgeting/liability', ['as'=>'finance.budgeting.liability', 'uses'=>'FinanceBudgetingController@index_liability']);
    Route::post('/finance/budgeting/liability', ['as'=>'finance.budgeting.addliability', 'uses'=>'FinanceBudgetingController@liability']);

    #Routes for Payments
    Route::get('/finance/payments', ['as'=>'finance.payments.index', 'uses'=>'FinancePaymentController@index']);
    Route::get('/finance/payments/history', ['as'=>'finance.payments.history', 'uses'=>'FinancePaymentController@history']);
    Route::get('/finance/payments/customer', ['as'=>'finance.payments.customer', 'uses'=>'FinancePaymentController@customer']);
    Route::get('/finance/payments/supplier', ['as'=>'finance.payments.supplier', 'uses'=>'FinancePaymentController@supplier']);
    Route::get('/finance/payments/customer/{id}', ['as'=>'finance.payments.customer_adjust', 'uses'=>'FinancePaymentController@customer_adjust']);
    Route::get('/finance/payments/supplier/{id}', ['as'=>'finance.payments.supplier_adjust', 'uses'=>'FinancePaymentController@supplier_adjust']);

    #Routes for Chat
    Route::get('/finance/chat', ['as'=>'finance.chat.index', 'uses'=>'FinanceChatController@index']);
});