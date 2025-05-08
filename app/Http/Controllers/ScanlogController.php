<?php

namespace App\Http\Controllers;

use App\Exports\ScanlogExport;
use App\Imports\ScanlogImport;
use App\Models\Scanlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
        return Excel::download(new ScanlogExport(), 'scanlog.xlsx');
    }

    public function proses()
    {
        $proses = Scanlog::whereBetween('scan_1', ['06:30:00', '07:10:59'])->update(['scan_1' => '07:00:00']);
        $proses = Scanlog::whereBetween('scan_1', ['07:11:00', '07:40:59'])->update(['scan_1' => '07:30:00']);
        $proses = Scanlog::whereBetween('scan_1', ['07:41:00', '08:00:00'])->update(['scan_1' => '08:00:00']);
        if ($proses) {
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
