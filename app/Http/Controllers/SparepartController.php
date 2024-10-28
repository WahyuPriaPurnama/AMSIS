<?php

namespace App\Http\Controllers;

use App\Exports\SparepartExport;
use App\Http\Requests\StoreSparepartRequest;
use App\Http\Requests\UpdateSparepartRequest;
use App\Models\Employee;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Sparepart::latest()->get();
        return view('spareparts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spareparts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSparepartRequest $request)
    {
        $this->authorize('create', Sparepart::class);
        $data = Sparepart::create($request->validated());
        if ($data) {
            return redirect()->route('spareparts.index')->with('alert', "Input data berhasil");
        } else {
            return redirect()->route('spareparts.index')->with('alert', "Input data gagal");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sparepart $sparepart) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSparepartRequest $request, Sparepart $sparepart)
    {
        $this->authorize('update', Sparepart::class);
        $sparepart->update($request->validated());

        return redirect()->route('spareparts.index')->with('alert', 'update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sparepart $sparepart)
    {
        $this->authorize('delete', Sparepart::class);
        $sparepart->delete();
        if ($sparepart) {
            return redirect()->route('spareparts.index')->with('alert', "hapus data berhasil");
        } else {
            return redirect()->route('spareparts.index')->with('alert', "hapus data gagal");
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $data = Sparepart::where('nama_barang', 'like', "%" . $search . "%")->get();

        return view('spareparts.index', compact('data'));
    }

    public function export()
    {
        return Excel::download(new SparepartExport, 'data-spareparts.xlsx');

    }
}
