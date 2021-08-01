<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\ProductCreateController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ProductStatisticsController;
use App\Http\Controllers\WarehouseListController;
use App\Http\Controllers\WarehouseStatisticsController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\ProductTransferController;
use App\Http\Controllers\WarehouseCreateController;
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
Route::get('/',[ProductUserController::class, 'logout'])->name('user.logout');

Route::group(["middleware" => "peroduct_session"],function () {

                                    // Products
//Product
Route::get('/product/home',[ProductHomeController::class, 'index'])->name('productHome.index');

Route::get('/product/create',[ProductCreateController::class, 'index'])->name('productCreate.index');
Route::post('/product/create',[ProductCreateController::class, 'create']);

// list of good products
Route::get('/product/list',[ProductListController::class, 'index'])->name('productList.index');
Route::post('/product/list',[ProductListController::class, 'index']);

// list of faulty products
Route::get('/product/list/faulty',[ProductListController::class, 'faulty'])->name('productListFaulty.index');

// autocomplete search good product
Route::post('/product/list/search',[ProductListController::class, 'search'])->name('productSearch.search');

// Update Product
Route::get('/product/edit/{id}',[ProductListController::class, 'editProduct'])->name('productList.editProduct');
Route::post('/product/edit/{id}',[ProductListController::class, 'updateProduct']);

// delete product
Route::get('/product/delete/{id}',[ProductListController::class, 'deleteProduct'])->name('productList.deleteProduct');
Route::post('/product/delete/{id}',[ProductListController::class, 'destroyProduct']);

// stocked product
Route::get('/product/stocks',[ProductStockController::class, 'index'])->name('productStocks.index');
Route::post('/product/stocks',[ProductStockController::class, 'index']);

// autocomplete search product stock
Route::post('/product/stocks/search',[ProductStockController::class, 'search'])->name('productStocks.search');

// product statistics
Route::get('/product/statistics',[ProductStatisticsController::class, 'index'])->name('productStatistics.index');

// transfer product
Route::get('/product/transfer',[ProductTransferController::class, 'index'])->name('productTransfer.index');
Route::post('/product/transfer',[ProductTransferController::class, 'transfer']);


                                //Warehouse
// create warehouse
Route::get('/warehouse/create',[WarehouseCreateController::class, 'index'])->name('warehouseCreate.index');
Route::post('/warehouse/create',[WarehouseCreateController::class, 'create']);

// list of warehouse
Route::get('/warehouse/list',[WarehouseListController::class, 'index'])->name('warehouseList.index');
Route::post('/warehouse/list',[WarehouseListController::class, 'index']);

// autocomplete search warehouse
Route::post('/warehouse/list/search',[WarehouseListController::class, 'search'])->name('warehouseList.search');

// Edit warehouse
Route::get('/warehouse/edit/{id}',[WarehouseListController::class, 'editWarehouse'])->name('warehouseList.edit');
Route::post('/warehouse/edit/{id}',[WarehouseListController::class, 'updateWarehouse']);

// Warehouse statistics
Route::get('/warehouse/statistics',[WarehouseStatisticsController::class, 'index'])->name('warehouseStatistics.index');


                                    //Others
// user activities
Route::get('/product/user/activities',[ProductUserController::class, 'activities'])->name('userActivities.index');
Route::post('/product/user/activities',[ProductUserController::class, 'activities']);

// autocomplete activity search
Route::post('/product/user/activities/search',[ProductUserController::class, 'searchActivity'])->name('userActivities.searchActivity');

// user levae
Route::get('/product/user/leave',[ProductUserController::class, 'leave'])->name('userLeave.index');
Route::post('/product/user/leave',[ProductUserController::class, 'verifyLeave']);
Route::get('/product/user/leave/myrequest',[ProductUserController::class, 'myLeave'])->name('myLeave.index');

// contact administration
Route::get('/product/user/administration',[ProductUserController::class, 'administration'])->name('userAdministration.index');
Route::post('/product/user/administration',[ProductUserController::class, 'verifyAdministration']);
Route::get('/product/user/administration/myissue',[ProductUserController::class, 'myIssue'])->name('userAdministration.myIssue');

//User profile
Route::get('/product/user/profile',[ProductUserController::class, 'profile'])->name('userProfile.index');

// user edit profile
Route::get('/product/user/edit',[ProductUserController::class, 'editProfile'])->name('userEditProfile.index');
Route::post('/product/user/edit',[ProductUserController::class, 'editProfileVerify']);

// user edit profile picture
Route::get('/product/user/edit/profilepicture',[ProductUserController::class, 'editProfilePicture'])->name('userEditProfilePicture.index');
Route::post('/product/user/edit/profilepicture',[ProductUserController::class, 'editProfilePictureVerify']);

// user change password
Route::get('/product/user/edit/changePassword',[ProductUserController::class, 'changePassword'])->name('userChangePassword.index');
Route::post('/product/user/edit/changePassword',[ProductUserController::class, 'changePasswordVerify']);

// user change password verification code
Route::get('/product/user/edit/changePassword/verify',[ProductUserController::class, 'verification'])->name('userChangeProfileVerication.index');
Route::post('/product/user/edit/changePassword/verify',[ProductUserController::class, 'verificationVerify']);


// Export
Route::get('/product/list/good/export',[ProductListController::class, 'exportGoodProduct'])->name('productList.exportGoodProduct');
Route::get('/product/list/faulty/export',[ProductListController::class, 'exportFaultyProduct'])->name('productList.exportFaultyProduct');
Route::get('/warehouse/list/export',[WarehouseListController::class, 'exportWarehouseList'])->name('warehouseList.exportWarehouseList');

});