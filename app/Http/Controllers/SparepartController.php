<?php

namespace App\Http\Controllers;

use App\Http\Requests\SparepartRequest;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sparepart::all();
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
    public function store(SparepartRequest $request)
    {
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
    public function edit(Sparepart $sparepart)
    {
        $data = Sparepart::all();
        return view('spareparts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sparepart $sparepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sparepart $sparepart)
    {
     
        $sparepart->delete();
        if ($sparepart) {
            return redirect()->route('spareparts.index')->with('alert', "hapus data berhasil");
        } else {
            return redirect()->route('spareparts.index')->with('alert', "hapus data gagal");
        }
    }
}
