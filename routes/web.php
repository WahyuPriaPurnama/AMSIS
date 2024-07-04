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
route::get('/tes',function(){
    return view('tes');
});

route::redirect('/', '/login');
route::controller(LoginController::class)->group(function () {
    route::get('/login', 'login');
    route::post('/login', '/processLogin');
    route::get('/logout', 'logout');
});
route::get('/login', [LoginController::class, 'login']);
route::post('/login', [LoginController::class, 'processLogin']);
route::resource('employees', EmployeeController::class)->middleware('login');
route::resource('subsidiaries', SubsidiaryController::class)->middleware('login');
route::resource('purchase_orders', PurchaseOrderController::class);
