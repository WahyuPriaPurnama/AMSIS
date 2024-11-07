<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchasing\StoreMasterBarangRequest;
use App\Http\Requests\Purchasing\UpdateMasterBarangRequest;
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
        $this->authorize('view', MasterBarang::class);
        $data = MasterBarang::Index()->sortable()->latest()->paginate(50);
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
        $this->authorize('create', MasterBarang::class);
        $data = MasterBarang::create($request->validated());
        if ($data) {
            return redirect()->route('master-barang.index')->with('alert', "input data $request->nama_barang berhasil");
        } else {
            return redirect()->route('master-barang.index')->with('alert2', "input data $request->nama_barang gagal");
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
    public function update(UpdateMasterBarangRequest $request, MasterBarang $masterBarang)
    {
        $this->authorize('update', MasterBarang::class);
        $masterBarang->update($request->validated());
        if ($masterBarang) {
            return redirect()->route('master-barang.index')->with('alert', "update $request->nama_barang berhasil");
        } else {
            return redirect()->route('master-barang.index')->with('alert2', "update $request->nama_barang gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterBarang $masterBarang)
    {
        $this->authorize('delete', MasterBarang::class);
        $masterBarang->delete();
        if ($masterBarang) {
            return redirect()->route('master-barang.index')->with('alert', "transaksi $masterBarang->nama_barang selesai");
        } else {
            return redirect()->route('master-barang.index')->with('alert2', "transaksi $masterBarang->nama_barang gagal diselesaikan");
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        // dd($search);
        $subsidiaries = Subsidiary::all();
        $suppliers = MasterSupplier::all();
        $data = MasterBarang::where('nama_barang', 'like', "%" . $search . "%")->paginate(50);
        return view('purchasing.master_barang.index', compact('data', 'suppliers', 'subsidiaries'));
    }

    public function trash()
    {
        $this->authorize('Forcedelete', MasterBarang::class);
        $data = MasterBarang::onlyTrashed()->Index()->sortable()->latest()->paginate(50);
        // dd($data);
        return view('purchasing.master_barang.trash', compact('data'));
    }
    public function restore($id)
    {

        $data = MasterBarang::onlyTrashed()->where('id', $id);
        $data->restore();
        if ($data) {
            return redirect()->route('master-barang.trash')->with('alert', "restore berhasil");
        } else {
            return redirect()->route('master-barang.trash')->with('alert2', "restore gagal");
        }
    }
}
