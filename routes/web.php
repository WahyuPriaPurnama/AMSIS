<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SubsidiaryController;
use App\Models\Subsidiary;
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

route::redirect('/', '/login');
route::get('/login',[LoginController::class,'login']);
route::post('/login',[LoginController::class,'processLogin']);
route::resource('employees', EmployeeController::class);
route::resource('subsidiaries', SubsidiaryController::class);
route::resource('purchase_orders', PurchaseOrderController::class);
