<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchasing\StoreMasterSupplierRequest;
use App\Http\Requests\Purchasing\UpdateMasterSupplierRequest;
use App\Models\Purchasing\MasterSupplier;
use Illuminate\Http\Request;

class MasterSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MasterSupplier::latest()->paginate(100);
        return view('purchasing.master_supplier.index', compact('data'));
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
    public function store(StoreMasterSupplierRequest $request)
    {
        $data = MasterSupplier::create($request->validated());
        if ($data) {
            return redirect()->route('master-supplier.index')->with('alert', "Input data $request->nama_supplier berhasil");
        } else {
            return redirect()->route('master-supplier.index')->with('alert', "Input data $request->nama_supplier gagal");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterSupplier $masterSupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterSupplier $masterSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterSupplierRequest $request, MasterSupplier $masterSupplier)
    {
        $masterSupplier->update($request->validated());
        if ($masterSupplier) {
            return redirect()->route('master-supplier.index')->with('alert', "update data $request->nama_supplier berhasil");
        } else {
            return redirect()->route('master-supplier.index')->with('alert', "update data $request->nama_supplier gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterSupplier $masterSupplier)
    {
        $masterSupplier->delete();
        if ($masterSupplier) {
            return redirect()->route('master-supplier.index')->with('alert', "hapus data $masterSupplier->nama_supplier berhasil");
        } else {
            return redirect()->route('master-supplier.index')->with('alert', "hapus data $masterSupplier->nama_supplier gagal");
        }
    }
}
