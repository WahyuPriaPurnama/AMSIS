<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Inventory::all();
        return view('inventories.index', ['inventories' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category' => 'required',
            'code' => 'required|unique:inventories,code,',
            'name' => 'required',
            'spec' => 'required',
            'qty' => 'required',
            'unit' => 'required',

        ]);
        History::create([
            'category' => $request->category,
            'code' => $request->code,
            'name' => $request->name,
            'qty' => $request->qty,
            'user' => Auth::user()->name

        ]);
        Inventory::create($validateData);
        return redirect()->route('inventories.index')->with('alert', "Input data {$validateData['name']} berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show($inventory)
    {
        $result = Inventory::find($inventory);
        return view('inventories.show', ['inventory' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $validateData = $request->validate([
            'category' => 'required',
            'code' => 'required|unique:inventories,code,' . $inventory->id,
            'name' => 'required',
            'spec' => 'required',
            'qty' => 'required',
            'unit' => 'required',
        ]);
        History::create([
            'category' => $request->category,
            'code' => $request->code,
            'name' => $request->name,
            'qty' => $request->qty,

        ]);
        Inventory::where('id', $inventory->id)->update($validateData);

        return redirect()->route('inventories.show', ['inventory' => $inventory->id])->with('alert', "update data {$validateData['name']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('alert', "hapus data $inventory->name berhasil");
    }

    public function history()
    {
        $history = History::all();
        return view('inventories.history', ['history' => $history]);
    }
}
