<?php

namespace App\Http\Controllers;

use App\Models\Subsidiary;
use Illuminate\Http\Request;

class SubsidiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsidiaries = Subsidiary::sortable()->paginate(5);
        return view('subsidiaries.index', ['subsidiaries' => $subsidiaries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subsidiaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:50',
            'tagline' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        Subsidiary::create($validateData);
        return redirect()->route('subsidiaries.index')->with('alert', "Input data {$validateData['name']} berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show($subsidiary)
    {
        $result = Subsidiary::find($subsidiary);
        return view('subsidiaries.show', ['subsidiary' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsidiary $subsidiary)
    {
        return view('subsidiaries.edit', ['subsidiary' => $subsidiary]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsidiary $subsidiary)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:50',
            'tagline' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        Subsidiary::where('id', $subsidiary->id)->update($validateData);
        return redirect()->route('subsidiaries.show', ['subsidiary' => $subsidiary->id])->with('alert', "update data {$validateData['name']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsidiary $subsidiary)
    {
        $subsidiary->delete();
        return redirect()->route('subsidiaries.index')->with('alert', "hapus data $subsidiary->name berhasil");
    }
}
