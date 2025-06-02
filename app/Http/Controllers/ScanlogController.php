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
            'file' => 'required|mimes:csv,xls,xlsx'
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

    public function ctime(Request $request)
    {
        $col = ['scan_1', 'scan_2', 'scan_3', 'scan_4'];
        $awal = $request->awal;
        $akhir = $request->akhir;
        $waktu = $request->waktu;

        foreach ($col as $k) {
            $data = DB::table('scanlogs');
            $data->whereBetween($k, [$awal . ':59', $akhir . ':59'])->update([$k => $waktu]);
        }

        $rows = Scanlog::all();
        foreach ($rows as $row) {
            $to = Carbon::parse($row->scan_1);
            $from = Carbon::parse($row->scan_2);
            $selisih = $from->diffInSeconds($to);
            $output = gmdate('H:i:s', $selisih);
            list($jam, $menit, $detik) = explode(':', $output);
            $jamKerja = $jam + ($menit / 60) + ($detik / 3600);
            $row->update(['selisih' => $jamKerja]);
        }

        if ($data) {
            return redirect()->route('scanlog.index')->with('alert', 'data berhasil diproses!');
        } else {
            return redirect()->route('scanlog.index')->with('alert2', 'data gagal diproses!');
        }
    }

    public function scanMasuk(Carbon $datetime)
    {
        $menitMasuk = $datetime->minute;
        if ($menitMasuk <= 10) {
            return $datetime->startOfHour();
        } else if ($menitMasuk <= 40) {
            return $datetime->setMinute(30)->setSecond(0);
        } else {
            return $datetime->addHour()->startOfHour();
        }
    }

    public function scanPulang(Carbon $datetime)
    {
        $menitPulang = $datetime->minute;
        if ($menitPulang <= 25) {
            return $datetime->startOfHour();
        } else if ($menitPulang <= 55) {
            return $datetime->setMinute(30)->setSecond(0);
        } else {
            return $datetime->addHour()->startOfHour();
        }
    }

    public function durasiKerja(Carbon $masuk, Carbon $pulang)
    {
        $scanMasuk = $this->scanMasuk($masuk);
        $scanPulang = $this->scanPulang($pulang);

        $durasiMenit = $scanMasuk->diffInRealMinutes($scanPulang);
        $durasiJam = $durasiMenit / 60;
        return $durasiJam;
    }

    public function convert()
    {
        $datas = Scanlog::where('status', 0)->get();
        $berhasil = false;
        foreach ($datas as $data) {
            if ($data->sm) {
                $data->sm = $this->scanMasuk(Carbon::parse($data->sm));
            }
            if ($data->sp) {
                $data->sp = $this->scanPulang(Carbon::parse($data->sp));
            }
            if ($data->sm && $data->sp) {
                $durasi = $this->durasiKerja($data->sm, $data->sp);
                $updated = $data->update([
                    'dk' => $durasi,
                    'sm' => $data->sm,
                    'sp' => $data->sp,
                    'status' => 1,
                ]);
            } else {
                $updated = $data->update([
                    'sm' => $data->sm,
                    'sp' => $data->sp,
                    'status' => 1,
                ]);
            }
            // dd($durasi);

            if ($updated) {
                $berhasil = true;
            }
        }
        if ($berhasil) {
            return redirect()->route('scanlog.index')->with('alert', 'berhasil dikonversi ke jam');
        } else if ($datas->isEmpty()) {
            return redirect()->route('scanlog.index')->with('alert2', 'tidak ada data yang perlu diproses');
        } else {
            return redirect()->route('scanlog.index')->with('alert2', 'gagal dikonversi ke jam');
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
