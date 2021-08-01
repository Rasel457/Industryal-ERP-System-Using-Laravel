<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRuserController;
use App\Http\Controllers\HRhomeController;
use App\Http\Controllers\HRemployeeController;
use App\Http\Controllers\HREmpScheduleController;
use App\Http\Controllers\HRgroupController;
use App\Http\Controllers\HRexpenseController;
use App\Http\Controllers\HRexpenseListController;
use App\Http\Controllers\HRExStatisticController;
use App\Http\Controllers\HRLeaveController;
use App\Http\Controllers\HRpayrollController;
use App\Http\Controllers\HRuserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect() -> route('signin.index');  
});
Route::get('/logout',[HRuserProfileController::class,'logout'])->name('HRuserProfile.logout');

Route::group(["middleware" => "hr_session"],function () {
//Hr home
Route::get('/HR/home',[HRhomeController::class,'index'])->name('HRhome.index');
//HR user create
Route::get('/HR/user/create',[HRuserController::class,'create'])->name('HRuser.create');
Route::post('/HR/user/create',[HRuserController::class,'verify']);
Route::get('/HR/user/edit/{id}',[HRuserController::class,'userEdit'])->name('HRuser.userEdit');
Route::post('/HR/user/edit/{id}',[HRuserController::class,'userUpdate']);
Route::get('/HR/user/delete/{id}',[HRuserController::class,'userDelete'])->name('HRuser.userDelete');
Route::post('/HR/user/delete/{id}',[HRuserController::class,'userDestroy']);


Route::get('/HR/user/list',[HRuserController::class,'index'])->name('HRuser.index');
Route::post('/HR/user/list',[HRuserController::class,'index']);

//Employee Create
Route::get('/HR/employee/create',[HRemployeeController::class,'create'])->name('HRemployee.create');
Route::post('/HR/employee/create',[HRemployeeController::class,'index']);
Route::get('/HR/employee/list',[HRemployeeController::class,'emplist'])->name('HRemployee.emplist');
Route::post('/HR/employee/list',[HRemployeeController::class,'emplist']);
Route::get('/HR/employee/edit/{employee_id}',[HRemployeeController::class,'empEdit'])->name('HRemployee.empEdit');
Route::post('/HR/employee/edit/{employee_id}',[HRemployeeController::class,'empUpdate']);
Route::get('/HR/employee/delete/{employee_id}',[HRemployeeController::class,'empDelete'])->name('HRemployee.empDelete');
Route::post('/HR/employee/delete/{employee_id}',[HRemployeeController::class,'empDestroy']);
Route::get('/HR/employee/group',[HRgroupController::class,'index'])->name('HRgroup.index');
Route::post('/HR/employee/group',[HRgroupController::class,'CreateGroup']);;
Route::get('/HR/employee/schedule',[HREmpScheduleController::class,'schedule'])->name('HREmpSchedule.schedule');
//Export
Route::get('/HR/employee/list/export',[HRemployeeController::class,'EmpListExport'])->name('HRemployee.EmpListExport');
//leave request
Route::get('/HR/leave/request',[HRLeaveController::class,'leave'])->name('HRLeave.leave');
Route::post('/HR/leave/request',[HRLeaveController::class,'VerifyLeave']);
Route::get('/HR/leave/approve/{id}',[HRLeaveController::class,'approve'])->name('HRLeave.approve');
Route::post('/HR/leave/approve/{id}',[HRLeaveController::class,'VerifyApprove']);
Route::get('/HR/leave/reject/{id}',[HRLeaveController::class,'reject'])->name('HRLeave.approve');
Route::post('/HR/leave/reject/{id}',[HRLeaveController::class,'VerifyReject']);
Route::get('/HR/leave/request/list',[HRLeaveController::class,'leaveList'])->name('HRLeave.leaveList');
//payroll
Route::get('/HR/payroll/show',[HRpayrollController::class,'show'])->name('HRpayroll.show');

//expense report
Route::get('/HR/expense/report',[HRexpenseController::class,'report'])->name('HRexpense.report');
Route::post('/HR/expense/report',[HRexpenseController::class,'create']);
Route::get('/HR/expense/list',[HRexpenseListController::class,'list'])->name('HRexpenseList.list');
Route::get('/HR/expense/edit/{id}',[HRexpenseListController::class,'expEdit'])->name('HRexpenseList.expEdit');
Route::post('/HR/expense/edit/{id}',[HRexpenseListController::class,'expUpdate']);
Route::get('/HR/expense/delete/{id}',[HRexpenseListController::class,'expDelete'])->name('HRexpenseList.expDelete');
Route::post('/HR/expense/delete/{id}',[HRexpenseListController::class,'expDestroy']);
Route::get('/HR/expense/statistic',[HRExStatisticController::class,'statistic'])->name('HRExStatistic.statistic');
Route::get('/HR/expense/list/export',[HRexpenseListController::class,'ExplistExport'])->name('HRexpenseList.ExplistExport');
//user profile
Route::get('/HR/user/profile',[HRuserProfileController::class,'details'])->name('HRuserProfile.details');
Route::get('/HR/user/profile/edit',[HRuserProfileController::class,'profileEdit'])->name('HRuserProfile.profileEdit');
Route::post('/HR/user/profile/edit',[HRuserProfileController::class,'profileUpdate']);
Route::get('/HR/user/profile/edit/changePassword',[HRuserProfileController::class,'changePassword'])->name('HRuserProfile.changePassword');
Route::post('/HR/user/profile/edit/changePassword',[HRuserProfileController::class,'PasswordUpdate']);
Route::get('/HR/user/profile/edit/uploadImage',[HRuserProfileController::class,'uploadImage'])->name('HRuserProfile.uploadImage');
Route::post('/HR/user/profile/edit/uploadImage',[HRuserProfileController::class,'VerifyUploadImage']);

});



