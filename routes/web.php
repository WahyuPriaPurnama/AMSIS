<?php

use App\Http\Controllers\EmployeeController;
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

route::resource('employees', EmployeeController::class);
route::resource('subsidiaries', SubsidiaryController::class);
