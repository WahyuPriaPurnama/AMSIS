<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    Auth::logout();
    return view('welcome');
});


Auth::routes();


//route admin
Route::get('admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');
Route::post('admin_dashboard/updatestatuspo', [App\Http\Controllers\Admin\DashboardController::class, 'updatestatuspo'])->name('updatestatuspo')->middleware('role:admin');
Route::get('admin_dashboard/proses_inv', [App\Http\Controllers\Admin\DashboardController::class, 'proses_inv'])->name('proses_inv')->middleware('role:admin');
Route::get('admin_dashboard/inputinv/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'input_inv'])->name('input_inv')->middleware('role:admin');

//route marketing
Route::get('marketing_dashboard', [App\Http\Controllers\Marketing\DashboardController::class, 'index'])->middleware('role:marketing');
Route::post('marketing_dashboard/inputpo', [App\Http\Controllers\Marketing\DashboardController::class, 'inputpo'])->name('inputpo')->middleware('role:marketing');
Route::post('marketing_dashboard/updatepo', [App\Http\Controllers\Marketing\DashboardController::class, 'updatepo'])->name('updatepo')->middleware('role:marketing');

//route gudang
Route::get('gudang_dashboard', [App\Http\Controllers\Gudang\DashboardController::class, 'index'])->middleware('role:gudang');
Route::get('gudang_dashboard/inputstock', [App\Http\Controllers\Gudang\DashboardController::class, 'inputstock'])->name('inputstock')->middleware('role:gudang');
Route::get('gudang_dashboard/tampilstock', [App\Http\Controllers\Gudang\DashboardController::class, 'tampilstock'])->name('tampilstock')->middleware('role:gudang');
Route::post('gudang_dashboard/updatestock/{id}', [App\Http\Controllers\Gudang\DashboardController::class, 'updatestock'])->name('updatestock')->middleware('role:gudang');
Route::get('gudang_dashboard/editstock/{id}', [App\Http\Controllers\Gudang\DashboardController::class, 'editstock'])->name('editstock')->middleware('role:gudang');
Route::get('gudang_dashboard/proses_sj', [App\Http\Controllers\Gudang\DashboardController::class, 'sjpdf'])->name('proses_sj')->middleware('role:gudang');
Route::get('gudang_dashboard/proses_bon', [App\Http\Controllers\Gudang\DashboardController::class, 'bonpdf'])->name('proses_bon')->middleware('role:gudang');
Route::get('gudang_dashboard/inputsj/{id}', [App\Http\Controllers\Gudang\DashboardController::class, 'inputsj'])->name('input_sj')->middleware('role:gudang');
Route::get('gudang_dashboard/inputbon/{id}', [App\Http\Controllers\Gudang\DashboardController::class, 'inputbon'])->name('input_bon')->middleware('role:gudang');


//route HRD
Route::get('/hrd_dashboard', [App\Http\Controllers\HRD\DashboardController::class, 'index'])->middleware('role:hrd');

//route Accounting
Route::get('/accounting_dashboard', [App\Http\Controllers\Accounting\DashboardController::class, 'index'])->middleware('role:accounting');

//Route Direksi
Route::get('/direksi_dashboard', [App\Http\Controllers\Direksi\DashboardController::class, 'index'])->middleware('role:direksi');
Route::get('/direksi_dashboard/po', [App\Http\Controllers\Direksi\DashboardController::class, 'tampilpodireksi'])->middleware('role:direksi');


Auth::routes();

//route pengadaan
Route::get('/pengadaan_dashboard', [App\Http\Controllers\Pengadaan\DashboardController::class, 'index'])->middleware('role:pengadaan');
Route::get('/pengadaan_dashboard/po', [App\Http\Controllers\Pengadaan\DashboardController::class, 'tampilpopengadaan'])->middleware('role:pengadaan');

//Dashboard
Route::post('updatecust',[App\Http\Controllers\customerController::class, 'updatecust'])->name('updatecust');
Route::get('inputcust', [App\Http\Controllers\customerController::class,'index']);
Route::post('simpancust',[App\Http\Controllers\customerController::class, 'simpancust'])->name('simpancust');
Route::get('hapuscust/{id}',[App\Http\Controllers\customerController::class,'hapuscust']);


Route::view('limbah','limbah.dashboard');