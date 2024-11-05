<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchasing\StoreMasterBarangRequest;
use App\Models\Purchasing\MasterBarang;
use App\Models\Purchasing\MasterSupplier;
use App\Models\Subsidiary;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MasterBarang::Index()->latest()->paginate(100);
        $subsidiaries = Subsidiary::all();
        $suppliers = MasterSupplier::all();
        return view('purchasing.master_barang.index', compact('data', 'subsidiaries', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMasterBarangRequest $request)
    {
        $data = MasterBarang::create($request->validated());
        if ($data) {
            return redirect()->route('master-barang.index')->with('alert', "input data $request->nama_barang berhasil");
        } else {
            return redirect()->route('master-barang.index')->with('alert', "input data $request->nama_barang gagal");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterBarang $masterBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterBarang $masterBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterBarang $masterBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterBarang $masterBarang)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->search;
        // dd($search);
        $subsidiaries = Subsidiary::all();
        $suppliers = MasterSupplier::all();
        $data = MasterBarang::where('nama_barang', 'like', "%" . $search . "%")->paginate(100);
        return view('master-barang.index', compact('data', 'suppliers', 'subsidiaries'));
    }
}
