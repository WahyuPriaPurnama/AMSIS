<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HarianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScanlogController;
use App\Http\Controllers\SubsidiaryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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
    route::resource('employees', EmployeeController::class);
    route::get('employee/foto_profil/{pp}', [EmployeeController::class, 'pp'])->name('employee.pp');
    route::get('employee/KTP/{ktp}', [EmployeeController::class, 'ktp'])->name('employee.ktp');
    route::get('employee/NPWP/{npwp}', [EmployeeController::class, 'npwp'])->name('employee.npwp');
    route::get('employee/KK/{kk}', [EmployeeController::class, 'kk'])->name('employee.kk');
    route::get('employee/BPJS-ket/{bpjs_ket}', [EmployeeController::class, 'bpjs_ket'])->name('employee.bpjs_ket');
    route::get('employee/BPJS-kes/{bpjs_kes}', [EmployeeController::class, 'bpjs_kes'])->name('employee.bpjs_kes');
    route::get('employee/export-pdf', [EmployeeController::class, 'index_pdf'])->name('employees.pdf');
    route::get('employee/export-excel', [EmployeeController::class, 'index_excel'])->name('employees.excel');
    route::get('employee/show-pdf/{employee}', [EmployeeController::class, 'show_pdf'])->name('employee.pdf');

    route::resource('subsidiaries', SubsidiaryController::class);
    route::resource('users', UserController::class);
    route::get('log-activity', [HomeController::class, 'logActivity'])->name('log.activity');
    route::get('Log-activity/truncate', [HomeController::class, 'truncate'])->name('log.activity.truncate');
    route::get('/home', [HomeController::class, 'index'])->name('dashboard');

    route::resource('vehicles', VehicleController::class);
    Route::prefix('vehicle')->controller(VehicleController::class)->group(function () {
        Route::get('foto/{foto}', 'foto')->name('vehicle.foto');
        Route::get('stnk/{stnk}', 'stnk')->name('vehicle.stnk');
        Route::get('pajak/{pajak}', 'pajak')->name('vehicle.pajak');
        Route::get('kir/{kir}', 'kir')->name('vehicle.kir');
        Route::get('qr/{qr}', 'qr')->name('vehicle.qr');
        Route::get('polis/{polis}', 'polis')->name('vehicle.polis');
        Route::get('export-pdf', 'index_pdf')->name('vehicles.pdf');
        Route::get('show-pdf/{id}', 'show_pdf')->name('vehicle.pdf');
    });

    route::resource('scanlog', ScanlogController::class);
    route::post('scanlog-import', [ScanlogController::class, 'import'])->name('scanlog.import');
    route::get('scanlog-export', [ScanlogController::class, 'export'])->name('scanlog.export');
    route::post('scanlog-convert', [ScanlogController::class, 'convert'])->name('scanlog.convert');
    route::get('scanlog-truncate', [ScanlogController::class, 'truncate'])->name('scanlog.truncate');
    route::get('scanlog-proses-gaji', [ScanlogController::class, 'prosesGaji'])->name('scanlog.proses.gaji');

    route::resource('karyawan-harian', HarianController::class);
    route::post('karyawan-harian-import', [HarianController::class, 'import'])->name('karyawan-harian.import');
    route::get('karyawan-harian-export', [HarianController::class, 'export'])->name('karyawan-harian.export');
    route::get('karyawan-harian-truncate', [HarianController::class, 'truncate'])->name('karyawan-harian.truncate');
    route::post('karyawan-cetak-slip/{pin}', [HarianController::class, 'cetakSlip'])->name('karyawan-cetak-slip');
});

use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

Route::get('/test-email', function () {
    $employee = \App\Models\Employee::first();

    $mailData = [
        'type' => 'birthday',
        'title' => 'Selamat Ulang Tahun ' . $employee->nama,
        'body' => 'Semoga sehat dan sukses selalu!',
        'subsidiary' => $employee->subsidiary->slug,
        'logo' => asset('images/logos/' . $employee->subsidiary->logo),
    ];

    Mail::to('wahyupriapurnama@gmail.com')->send(new MyTestMail($mailData, $employee));

    return 'Email berhasil dikirim!';
});

Auth::routes([
    'register' => false
]);
route::redirect('/', '/login');

//e-slip

route::get('/ams-malang', function () {
    return view('e-slip.ams');
});
route::get('/rmm-malang', function () {
    return view('e-slip.rmm');
});
route::get('/eln-malang', function () {
    return view('e-slip.eln1');
});
route::get('/eln-bwi', function () {
    return view('e-slip.eln2');
});
route::get('/haka-bwi', function () {
    return view('e-slip.haka');
});
route::get('/bofi-bwi', function () {
    return view('e-slip.bofi');
});
