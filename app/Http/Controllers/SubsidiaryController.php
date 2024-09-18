<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubsidiaryRequest;
use App\Models\Subsidiary;
use Illuminate\Http\Request;

class SubsidiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', Subsidiary::class);

        $subsidiaries = Subsidiary::Index()->get();
        return view('subsidiaries.index', compact('subsidiaries'));
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
    public function store(SubsidiaryRequest $request)
    {
        $this->authorize('create', Subsidiary::class);
        \App\Helpers\LogActivity::addToLog();
        Subsidiary::create($request->validated());
        return redirect()->route('subsidiaries.index')->with('alert', "Input data {$request['name']} berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show(Subsidiary $subsidiary)
    {
        return view('subsidiaries.show', compact('subsidiary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsidiary $subsidiary)
    {
        $this->authorize('update', Subsidiary::class);
        return view('subsidiaries.edit', ['subsidiary' => $subsidiary]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubsidiaryRequest $request, Subsidiary $subsidiary)
    {
        $this->authorize('update', Subsidiary::class);
        \App\Helpers\LogActivity::addToLog();
     
        Subsidiary::where('id', $subsidiary->id)->update($request->validated());
        return redirect()->route('subsidiaries.show', ['subsidiary' => $subsidiary->id])->with('alert', "update data berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsidiary $subsidiary)
    {
        $this->authorize('delete', Subsidiary::class);
        \App\Helpers\LogActivity::addToLog();
        $subsidiary->delete();
        return redirect()->route('subsidiaries.index')->with('alert', "hapus data $subsidiary->name berhasil");
    }
}
