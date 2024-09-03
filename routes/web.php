<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Esp32Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubsidiaryController;
use App\Http\Controllers\UserController;
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
    route::get('employee/search', [EmployeeController::class, 'search'])->name('employee.search');
    route::resource('employees', EmployeeController::class);
    route::get('employee/foto_profil/{pp}', [EmployeeController::class, 'pp'])->name('employee.pp');
    route::get('employee/KTP/{ktp}', [EmployeeController::class, 'ktp'])->name('employee.ktp');
    route::get('employee/NPWP/{npwp}', [EmployeeController::class, 'npwp'])->name('employee.npwp');
    route::get('employee/KK/{kk}', [EmployeeController::class, 'kk'])->name('employee.kk');
    route::get('employee/BPJS-ket/{bpjs_ket}', [EmployeeController::class, 'bpjs_ket'])->name('employee.bpjs_ket');
    route::get('employee/BPJS-kes/{bpjs_kes}', [EmployeeController::class, 'bpjs_kes'])->name('employee.bpjs_kes');
    route::get('/export-pdf', [EmployeeController::class, 'index_pdf'])->name('employees.pdf');
    route::get('/show-pdf/{employee}', [EmployeeController::class, 'show_pdf'])->name('employee.pdf');
    route::resource('subsidiaries', SubsidiaryController::class);
    route::resource('users', UserController::class);
    route::get('logActivity', [HomeController::class, 'logActivity'])->name('log.activity');
    route::get('/home', [HomeController::class, 'index']);
});

Auth::routes([
    'register' => false
]);
route::redirect('/', '/login');
route::get('/kirim-email', [EmployeeController::class, 'mail']);

route::get('/esp32', [Esp32Controller::class, 'index'])->name('esp32.index');
route::post('/data', [Esp32Controller::class, 'store']);

