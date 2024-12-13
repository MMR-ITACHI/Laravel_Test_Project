<?php

use App\Http\Controllers\backend\BranchController;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\CostController;
 use App\Http\Controllers\backend\CourierDetailsController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\UnitController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Admin

Route::middleware('guest:admin')->prefix('admin')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'check_user']);

    

});

Route::middleware('auth:admin')->prefix('admin')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::view('/dashboard','backend.admin_dashboard');
    Route::resource('/branch', BranchController::class);
    Route::resource('/manager', ManagerController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/cost', CostController::class);
    Route::resource('/company', CompanyController::class);

});



//Manager

Route::middleware('guest:manager')->prefix('manager')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Manager\LoginController::class, 'login'])->name('manager.login');
    Route::post('login', [App\Http\Controllers\Auth\Manager\LoginController::class, 'check_user']);

    

});

Route::middleware('auth:manager')->prefix('manager')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Manager\LoginController::class, 'logout'])->name('manager.logout');

    Route::view('/dashboard','backend.manager1_dashboard')->name('manager.dashboard');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('/staff', StaffController::class);

    Route::get('/courierinfo', [ManagerController::class, 'courierInfo'])->name('courier.info');
    Route::get('/courier/status/{id}',[ManagerController::class,'changeStatus'])->name('changeStatus');

    Route::get('/ontheWay', [ManagerController::class, 'ontheWay'])->name('ontheWay.info');
    Route::get('/ontheway/{id}',[ManagerController::class,'changeStatus1'])->name('changeStatus1');

   // Route::get('/Shipped', [ManagerController::class, 'Shipped'])->name('Shipped.info');
   // Route::get('/Shipped/{id}',[ManagerController::class,'changeStatus2'])->name('changeStatus2');


    Route::get('/Shipped', [ManagerController::class, 'Shipped1'])->name('Shipped.info');

    

});




//Employee

Route::middleware('guest:employee')->prefix('employee')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Employee\LoginController::class, 'login'])->name('employee.login');
    Route::post('login', [App\Http\Controllers\Auth\Employee\LoginController::class, 'check_user']);

    

});

Route::middleware('auth:employee')->prefix('employee')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Employee\LoginController::class, 'logout'])->name('employee.logout');

    Route::view('/dashboard','backend.employee1_dashboard');
    Route::resource('/courierdetails', CourierDetailsController::class);
    
    Route::get('/get-cost/{unit_id}', [CourierDetailsController::class, 'getCost'])->name('getCost');
    Route::get('/company-form', [CourierDetailsController::class, 'CompanyForm'])->name('companyForm');
    
   Route::get('/invoice/{id}',[CourierDetailsController::class, 'Invoice'])->name('invoice');

});



require __DIR__.'/auth.php';
