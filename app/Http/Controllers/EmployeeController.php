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
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nip' => 'required|min:10|max:16|unique:employees',
            'nama' => 'required|min:3|max:50',
            'nik' => 'required|size:16|unique:employees',
            'perusahaan' => '',
            'divisi' => 'required|max:20',
            'departemen' => 'required|max:20',
            'seksi' => 'required|max:20',
            'posisi' => '',
            'status_peg' => '',
            'tgl_masuk' => 'required',
            'awal_kontrak' => 'required',
            'akhir_kontrak' => 'required',
            'tmpt_lahir' => 'required|max:20',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'email' => 'required',
            'pend_trkhr' => '',
            'jurusan' => 'required|max:25',
            'thn_lulus' => 'required|max:4',
            'nama_ibu' => 'required|max:25',
            'npwp' => 'required|size:16',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => 'required|max:25',
            'no_kd' => 'required|max:12',
            'hubungan' => 'required|max:15'

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
            'nip' => 'required|min:10|max:16|unique:employees,nip,' . $employee->id,
            'nama' => 'required|min:3|max:50',
            'nik' => 'required|size:16|unique:employees,nik,' . $employee->id,
            'perusahaan' => '',
            'divisi' => 'required|max:20',
            'departemen' => 'required|max:20',
            'seksi' => 'required|max:20',
            'posisi' => '',
            'status_peg' => '',
            'tgl_masuk' => 'required',
            'awal_kontrak' => 'required',
            'akhir_kontrak' => 'required',
            'tmpt_lahir' => 'required|max:20',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'email' => 'required',
            'pend_trkhr' => '',
            'jurusan' => 'required|max:25',
            'thn_lulus' => 'required|max:4',
            'nama_ibu' => 'required|max:25',
            'npwp' => 'required|size:16',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => 'required|max:25',
            'no_kd' => 'required|max:12',
            'hubungan' => 'required|max:15'
        ]);
        Employee::where('id', $employee->id)->update($validateData);
        return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data {$validateData['nama']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('alert', "hapus data $employee->nama berhasil");
    }
}
