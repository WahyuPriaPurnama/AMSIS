<?php

namespace App\Http\Controllers;

use App\Exports\ScanlogExport;
use App\Imports\ScanlogImport;
use App\Models\Scanlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ScanlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scanlog = Scanlog::latest()->get();
        return view('scanlog.index', compact('scanlog'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new ScanlogImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            return redirect()->route('scanlog.index')->with(['alert' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('scanlog.index')->with(['alert2' => 'Data Gagal Diimport!']);
        }
    }

    public function export()
    {
        return Excel::download(new ScanlogExport(), "scanlog " . now() . ".xlsx");
    }
 // public function ctime(Request $request)
    // {
    //     $col = ['scan_1', 'scan_2', 'scan_3', 'scan_4'];
    //     $awal = $request->awal;
    //     $akhir = $request->akhir;
    //     $waktu = $request->waktu;

    //     foreach ($col as $k) {
    //         $data = DB::table('scanlogs');
    //         $data->whereBetween($k, [$awal . ':59', $akhir . ':59'])->update([$k => $waktu]);
    //     }

    //     $rows = Scanlog::all();
    //     foreach ($rows as $row) {
    //         $to = Carbon::parse($row->scan_1);
    //         $from = Carbon::parse($row->scan_2);
    //         $selisih = $from->diffInSeconds($to);
    //         $output = gmdate('H:i:s', $selisih);
    //         list($jam, $menit, $detik) = explode(':', $output);
    //         $jamKerja = $jam + ($menit / 60) + ($detik / 3600);
    //         $row->update(['selisih' => $jamKerja]);
    //     }

    //     if ($data) {
    //         return redirect()->route('scanlog.index')->with('alert', 'data berhasil diproses!');
    //     } else {
    //         return redirect()->route('scanlog.index')->with('alert2', 'data gagal diproses!');
    //     }
    // }

    public function scanPulang(Carbon $datetime)
    {
        $menitPulang = $datetime->minute;
        if ($menitPulang <= 25) {
            return $datetime->copy()->startOfHour();
        } else if ($menitPulang <= 55) {
            return $datetime->copy()->setMinute(30)->setSecond(0);
        } else {
            return $datetime->copy()->addHour()->startOfHour();
        }
    }
    
    public function scanMasuk(Carbon $datetime, Carbon $jamMasukJadwal)
    {
        $menitMasuk = $datetime->minute;
        if ($menitMasuk <= 10) {
            $hasil = $datetime->copy()->startOfHour();
        } else if ($menitMasuk <= 40) {
            $hasil = $datetime->copy()->setMinute(30)->setSecond(0);
        } else {
            $hasil = $datetime->copy()->addHour()->startOfHour();
        }
        return $hasil->lt($jamMasukJadwal) ? $jamMasukJadwal : $hasil;
    }


    public function durasiKerja(Carbon $masuk, Carbon $pulang, Carbon $jamMasukJadwal)
    {
        $scanMasuk = $this->scanMasuk($masuk, $jamMasukJadwal);
        $scanPulang = $this->scanPulang($pulang);

        if (empty($scanMasuk) or empty($scanPulang) or $scanMasuk->format('H:i:s') === '00:00:00' or $scanPulang->format('H:i:s') === '00:00:00') {
            return null;
        }

        //shift malam (jam pulang < jam masuk)
        if ($scanPulang->lt($scanMasuk)) {
            $scanPulang->addDay();
        }

        //hitung durasi kerja dalam jam (float)
        $durasiMenit = $scanMasuk->diffInRealMinutes($scanPulang);
        $durasiJam = $durasiMenit / 60;

        //potong istirahat
        if ($durasiJam >= 10) {
            $durasiJam -= 1.5;
        } else {
            $durasiJam -= 1;
        }

        //pastikan selalu positif
        return $durasiJam > 0 ? round($durasiJam, 2) : 0;
    }

    public function convert()
    {
        $datas = Scanlog::where('status', 0)->get();
        $berhasil = 0;

        foreach ($datas as $data) {
            $jamMasukJadwal = $data->jm ? Carbon::parse($data->jm) : null;
            $scanMasuk = $data->sm ? $this->scanMasuk(Carbon::parse($data->sm), $jamMasukJadwal) : null;
            $scanPulang = $data->sp ? $this->scanPulang(Carbon::parse($data->sp)) : null;

            // Cek tidak lengkap atau tidak valid
            if (
                empty($scanMasuk) ||
                empty($scanPulang) ||
                ($scanMasuk instanceof \Carbon\Carbon && $scanMasuk->format('H:i:s') === '00:00:00') ||
                ($scanPulang instanceof \Carbon\Carbon && $scanPulang->format('H:i:s') === '00:00:00')
            ) {
                $data->update([
                    'sm' => $scanMasuk,
                    'sp' => $scanPulang,
                    'status' => 2,
                ]);
                continue;
            }

            // Durasi kerja valid
            $durasi = $this->durasiKerja($scanMasuk, $scanPulang, $jamMasukJadwal);
            $updated = $data->update([
                'dk' => $durasi,
                'sm' => $scanMasuk,
                'sp' => $scanPulang,
                'status' => 1,
            ]);

            if ($updated) {
                $berhasil++;
            }
        }

        if ($berhasil > 0) {
            return redirect()->route('scanlog.index')->with('alert', "berhasil data berhasil dikonversi ke jam");
        } else if ($datas->isEmpty()) {
            return redirect()->route('scanlog.index')->with('alert2', 'Tidak ada data yang perlu diproses');
        } else {
            return redirect()->route('scanlog.index')->with('alert2', 'Gagal mengonversi data ke jam');
        }
    }


    public function truncate()
    {
        $truncate = Scanlog::query()->truncate();

        if ($truncate) {
            return redirect()->route('scanlog.index')->with('alert', 'data berhasil dikosongkan!');
        } else {
            return redirect()->route('scanlog.index')->with('alert2', 'data gagal dikosongkan!');
        }
    }
}
