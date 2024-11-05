<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubsidiaryRequest;
use App\Models\Subsidiary;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubsidiaryController extends Controller
{
    use FileUpload;
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
        $data = Subsidiary::create($request->validated());
        if ($request->file('logo')) {
            $logo = $this->fileUpload($request, 'public/subsidiary/logo', 'logo');
            $data->update(['logo' => $logo->hashName()]);
        }
        return redirect()->route('subsidiaries.index')->with('alert', "Input data berhasil");
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
        $subsidiary::where('id', $subsidiary->id)->update($request->validated());
        if ($request->file('logo')) {
            Storage::disk('local')->delete('public/subsidiary/logo/' . $subsidiary->logo);
            $logo = $this->fileUpload($request, 'public/subsidiary/logo/', 'logo');
            $subsidiary->update(['logo' => $logo->hashName()]);
        }
        return redirect()->route('subsidiaries.index')->with('alert', "update data $subsidiary->name berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsidiary $subsidiary)
    {
        $this->authorize('delete', Subsidiary::class);
        \App\Helpers\LogActivity::addToLog();
        Storage::disk('local')->delete('public/subsidiary/logo/' . $subsidiary->logo);
        $subsidiary->delete();
        return redirect()->route('subsidiaries.index')->with('alert', "hapus data $subsidiary->name berhasil");
    }
}
