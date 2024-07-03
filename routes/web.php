<?php

use App\Http\Controllers\EmployeeController;
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


route::redirect('/', '/employees');
route::controller(EmployeeController::class)->group(function () {
    route::get('/employees', 'index')->name('employees.index');
    route::get('/employees/create', 'create')->name('employees.create');
    route::post('/employees', 'store')->name('employees.store');
    route::get('/employees/{employee}', 'show')->name('employees.show');
    route::get('/employees/{employee}/edit', 'edit')->name('employees.edit');
    route::put('/employees/{employee}', 'update')->name('employees.update');
    route::delete('/employees/{employee}', 'destroy')->name('employees.destroy');
    route::get('/subsidiary','subsidiary');
});
