<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
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
            'nik' => 'required|size:16|unique:employees',
            'name' => 'required|min:3|max:50',
            'dob' => 'required',
            'gender' => 'required|in:L,P',
            'subsidiary' => 'required',
            'position' => 'required',
            'address' => '',
        ]);
        Employee::create($validateData);
        return redirect()->route('employees.index')->with('alert', "Input data {$validateData['name']} berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show($employee)
    {

        $result = Employee::find($employee);
        return view('employees.show', ['employee' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validateData = $request->validate([
            'nik' => 'required|size:16|unique:employees,nik,' . $employee->id,
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:L,P',
            'subsidiary' => 'required',
            'position' => 'required',
            'address' => '',
        ]);
        Employee::where('id', $employee->id)->update($validateData);
        return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data {$validateData['name']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('alert', "hapus data $employee->name berhasil");
    }
}
