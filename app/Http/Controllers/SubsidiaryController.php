<?php

namespace App\Http\Controllers;

use App\Models\Subsidiary;
use App\Models\User;
use Illuminate\Http\Request;

class SubsidiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsidiaries = Subsidiary::withCount('employees')->get();
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
        $this->authorize('create', Subsidiary::class);
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
        $this->authorize('update', Subsidiary::class);
        return view('subsidiaries.edit', ['subsidiary' => $subsidiary]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsidiary $subsidiary)
    {
        $this->authorize('update', Subsidiary::class);
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
        $this->authorize('delete', Subsidiary::class);
        $subsidiary->delete();
        return redirect()->route('subsidiaries.index')->with('alert', "hapus data $subsidiary->name berhasil");
    }

    public function listUser()
    {
        $users = User::all();
        return view('auth.userlist', ['users' => $users]);
    }
}
