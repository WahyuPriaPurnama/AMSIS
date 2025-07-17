<?php

namespace App\Http\Controllers;

use App\Exports\HarianExport;
use App\Imports\HarianImport;
use App\Models\Harian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HarianController extends Controller
{

    public function cetakSlip(Request $request)
    {
        dd($request->end_date);
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
        $import = Excel::import(new HarianImport, storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            return redirect()->route('karyawan-harian.index')->with(['alert' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('karyawan-harian.index')->with(['alert2' => 'Data Gagal Diimport!']);
        }
    }

    public function export()
    {
        return Excel::download(new HarianExport(), "karyawan " . now() . ".xlsx");
    }

    public function truncate()
    {
        Harian::truncate();
        return redirect()->route('karyawan-harian.index')->with(['alert' => 'Data Berhasil Ditruncate!']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $harian = Harian::latest()->get();
        return view('scanlog.harian', compact('harian'));
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
    public function show(Harian $harian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harian $harian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Harian $harian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Harian $harian)
    {
        //
    }
}
