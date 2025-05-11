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

use function Laravel\Prompts\table;

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

    public function proses(Request $request)
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
            $row->update(['selisih' => $output]);
        }

        if ($data) {
            return redirect()->route('scanlog.index')->with(['alert' => 'data berhasil diproses!']);
        } else {
            return redirect()->route('scanlog.index')->with(['alert2' => 'data gagal diproses!']);
        }
    }

    public function truncate()
    {
        $truncate = Scanlog::query()->truncate();

        if ($truncate) {
            return redirect()->route('scanlog.index')->with(['alert' => 'data berhasil dikosongkan!']);
        } else {
            return redirect()->route('scanlog.index')->with(['alert2' => 'data gagal dikosongkan!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Scanlog $scanlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scanlog $scanlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scanlog $scanlog) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scanlog $scanlog)
    {
        //
    }
}
