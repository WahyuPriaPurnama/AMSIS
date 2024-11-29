<?php

namespace App\Console\Commands;

use App\Mail\MyTestMail;
use App\Models\Employee;
use App\Models\Purchasing\MasterBarang;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail reminder to HRD & GA';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $time = Carbon::now()->diffInDays($employee->akhir_kontrak);
            if ($time == 30 or $time == 15 or $time == 7) {

                $mailData = [
                    'title' => 'Reminder Sisa Kontrak ' . $employee->nama,
                    'body' => "Dengan Email ini kami menginformasikan bahwa karyawan dengan nama " . $employee->nama . " dari plant " . $employee->subsidiary->name . " memiliki sisa masa kontrak " . $time . " hari lagi."
                ];

                Mail::to(['wahyupriapurnama@gmail.com', 'hrdmgr@amsgroup.co.id', 'hrd@amsgroup.co.id'])->send(new MyTestMail($mailData));
            }
        }

        $barangs = MasterBarang::all();

        foreach ($barangs as $barang) {
            if ($barang->kategori == 'Periodik') {
                $next_order = Carbon::parse($barang->tgl_pembelian)->addDay($barang->periode);
                $periode = Carbon::now()->diffInDays($next_order);

                if ($periode == 7) {

                    $mailData = [
                        'title' => 'Reminder Pembelian' . $barang->nama_barang,
                        'body' => "Dengan Email ini kami menginformasikan bahwa waktu pembelian " . $barang->nama_barang . " dari plant " . $barang->subsidiary->name . " tinggal " . $periode . " hari lagi."
                    ];

                    Mail::to(['wahyupriapurnama@gmail.com', 'purchasing@amsgroup.co.id'])->send(new MyTestMail($mailData));
                }
            }
        }

        $vehicles = Vehicle::all();
        foreach ($vehicles as $vehicle) {
            $stnk = Carbon::now()->diffInDays($vehicle->stnk);
            $pajak = Carbon::now()->diffInDays($vehicle->pajak);
            $kir = Carbon::now()->diffInDays($vehicle->kir);
            $asuransi = Carbon::now()->diffInDays($vehicle->jth_tempo);

            if ($stnk == 30 or $stnk == 15) {
                $mailData = [
                    'title' => 'Reminder Perpanjangan STNK ' . $vehicle->jenis_kendaraan,
                    $vehicle->nopol,
                    'body' => "Dengan email ini kami menginformasikan bahwa masa berlaku STNK " . $vehicle->jenis_kendaraan . " dari plant " . $vehicle->subsidiary->name . " tinggal " . $stnk . " hari lagi."
                ];

                Mail::to(['wahyupriapurnama@gmail.com', 'amsdriver29@gmail.com', 'hrd@eln.amsgroup.co.id', 'hrd@amsgroup.co.id'])->send(new MyTestMail($mailData));
            } elseif ($pajak == 30 or $pajak == 15) {
                $mailData = [
                    'title' => 'Reminder Perpanjangan Pajak Kendaraan ' . $vehicle->jenis_kendaraan,
                    $vehicle->nopol,
                    'body' => "Dengan email ini kami menginformasikan bahwa masa berlaku Pajak " . $vehicle->pajak . " dari plant " . $vehicle->subsidiary->name . " tinggal " . $pajak . " hari lagi."
                ];

                Mail::to(['wahyupriapurnama@gmail.com', 'amsdriver29@gmail.com', 'hrd@eln.amsgroup.co.id', 'hrd@amsgroup.co.id'])->send(new MyTestMail($mailData));
            } elseif ($kir == 30 or $kir == 15) {
                $mailData = [
                    'title' => 'Reminder Perpanjangan KIR ' . $vehicle->jenis_kendaraan,
                    $vehicle->nopol,
                    'body' => "Dengan email ini kami menginformasikan bahwa masa berlaku KIR " . $vehicle->kir . " dari plant " . $vehicle->subsidiary->name . " tinggal " . $kir . " hari lagi."
                ];

                Mail::to(['wahyupriapurnama@gmail.com', 'amsdriver29@gmail.com', 'hrd@eln.amsgroup.co.id', 'hrd@amsgroup.co.id'])->send(new MyTestMail($mailData));
            } elseif ($asuransi == 30 or $asuransi == 15) {
                $mailData = [
                    'title' => 'Reminder Perpanjangan Asuransi ' . $vehicle->jenis_kendaraan,
                    $vehicle->nopol,
                    'body' => "Dengan email ini kami menginformasikan bahwa masa berlaku asuransi " . $vehicle->kir . " dari plant " . $vehicle->subsidiary->name . " tinggal " . $kir . " hari lagi."
                ];

                Mail::to(['wahyupriapurnama@gmail.com', 'amsdriver29@gmail.com', 'hrd@eln.amsgroup.co.id', 'hrd@amsgroup.co.id'])->send(new MyTestMail($mailData));
            }
        }
        Log::info('cron job berhasil dijalankan ' . date('Y-m-d H:i:s'));
    }
}
