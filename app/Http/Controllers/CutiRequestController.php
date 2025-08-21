<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_days' => 'required|integer|min:1',
            'attachment_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'note' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        if (!$user->employee) {
            return redirect()->back()->withErrors(['error' => 'User does not have an associated employee record.']);
        }

        return redirect()->route('cuti-requests.index')->with('success', 'Cuti request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
