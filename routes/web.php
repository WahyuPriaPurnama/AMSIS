<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SubsidiaryController;
use Illuminate\Support\Facades\Auth;
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

route::middleware('auth')->group(function () {
    route::get('employees/search', [EmployeeController::class, 'search'])->name('employees.search');
    route::resource('employees', EmployeeController::class);
    route::resource('subsidiaries', SubsidiaryController::class);
    route::resource('purchase_orders', PurchaseOrderController::class);
    route::resource('inventories', InventoryController::class);
    route::get('/history', [InventoryController::class, 'history'])->name('history.index');
});

Auth::routes();
route::redirect('/home', '/employees');
route::redirect('/', '/login');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
