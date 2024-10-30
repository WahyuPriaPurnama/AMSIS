<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use App\Models\Purchasing\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MasterBarang::latest()->paginate(100);
        return view('purchasing.master_barang.index', compact('data'));
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
}
