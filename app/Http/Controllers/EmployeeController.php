<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use App\Models\Employee;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('subsidiary')->sortable()->latest()->paginate(25);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Employee::class);
        $subsidiaries=Subsidiary::all();
        return view('employees.create',compact('subsidiaries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Employee::class);
        $validateData = $request->validate([
            'nip' => 'required|size:9|unique:employees',
            'nama' => 'required|min:3|max:50',
            'nik' => 'required|size:16|unique:employees',
            'subsidiary_id' => 'required',
            'divisi' => 'required|max:20',
            'departemen' => 'required|max:20',
            'seksi' => 'required|max:20',
            'posisi' => 'required',
            'status_peg' => 'required',
            'tgl_masuk' => 'required',
            'awal_kontrak' => '',
            'akhir_kontrak' => '',
            'tmpt_lahir' => 'max:20',
            'tgl_lahir' => '',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => '',
            'no_telp' => '',
            'email' => '',
            'pend_trkhr' => '',
            'jurusan' => 'max:25',
            'thn_lulus' => 'max:4',
            'nama_ibu' => 'max:25',
            'npwp' => 'max:31',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => 'max:50',
            'no_kd' => 'max:12',
            'hubungan' => 'max:15',
            'pp' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->file('pp')) {
            $pp = $request->file('pp');
            $pp->storeAs('public/foto_profil', $pp->hashName());
            Employee::create(['pp' => $pp->hashName()]);
        }

        $data = Employee::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'subsidiary_id' => $request->subsidiary_id,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen,
            'seksi' => $request->seksi,
            'posisi' => $request->posisi,
            'status_peg' => $request->status_peg,
            'tgl_masuk' => $request->tgl_masuk,
            'awal_kontrak' => $request->awal_kontrak,
            'akhir_kontrak' => $request->akhir_kontrak,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'pend_trkhr' => $request->pend_trkhr,
            'jurusan' => $request->jurusan,
            'thn_lulus' => $request->thn_lulus,
            'nama_ibu' => $request->nama_ibu,
            'npwp' => $request->npwp,
            'status' => $request->status,
            'jml_ank' => $request->jml_ank,
            'nama_kd' => $request->nama_kd,
            'no_kd' => $request->no_kd,
            'hubungan' => $request->hubungan,
        ]);

        if ($data) {
            return redirect()->route('employees.index')->with('alert', "Input data {$validateData['nama']} berhasil");
        } else {
            return redirect()->route('employees.index')->with('alert', "Input data {$validateData['nama']} gagal");
        }
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
        $this->authorize('update', Employee::class);
        $subsidiaries=Subsidiary::all();
        return view('employees.edit', compact(['employee','subsidiaries']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $this->authorize('update', Employee::class);
        $validateData = $request->validate([
            'nip' => 'required|size:9|unique:employees,nip,' . $employee->id,
            'nama' => 'required|min:3|max:50',
            'nik' => 'required|size:16|unique:employees,nik,' . $employee->id,
            'subsidiary_id' => 'required',
            'divisi' => 'required|max:20',
            'departemen' => 'required|max:20',
            'seksi' => 'required|max:20',
            'posisi' => 'required',
            'status_peg' => 'required',
            'tgl_masuk' => 'required',
            'awal_kontrak' => '',
            'akhir_kontrak' => '',

            'tmpt_lahir' => 'max:20',
            'tgl_lahir' => '',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => '',
            'no_telp' => '',
            'email' => '',
            'pend_trkhr' => '',
            'jurusan' => 'max:25',
            'thn_lulus' => 'max:4',
            'nama_ibu' => 'max:25',
            'npwp' => 'max:31',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => 'max:50',
            'no_kd' => 'max:12',
            'hubungan' => 'max:15',
        ]);

        $employee = Employee::findOrFail($employee->id);
        if ($request->file('pp') == "") {
            $employee->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'subsidiary_id' => $request->subsidiary_id,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen,
                'seksi' => $request->seksi,
                'posisi' => $request->posisi,
                'status_peg' => $request->status_peg,
                'tgl_masuk' => $request->tgl_masuk,
                'awal_kontrak' => $request->awal_kontrak,
                'akhir_kontrak' => $request->akhir_kontrak,

                'tmpt_lahir' => $request->tmpt_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'pend_trkhr' => $request->pend_trkhr,
                'jurusan' => $request->jurusan,
                'thn_lulus' => $request->thn_lulus,
                'nama_ibu' => $request->nama_ibu,
                'npwp' => $request->npwp,
                'status' => $request->status,
                'jml_ank' => $request->jml_ank,
                'nama_kd' => $request->nama_kd,
                'no_kd' => $request->no_kd,
                'hubungan' => $request->hubungan,
            ]);
        } else {
            Storage::disk('local')->delete('public/foto_profil/' . $employee->pp);

            $pp = $request->file('pp');
            $pp->storeAs('public/foto_profil', $pp->hashName());

            $employee->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'subsidiary_id' => $request->subsidiary_id,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen,
                'seksi' => $request->seksi,
                'posisi' => $request->posisi,
                'status_peg' => $request->status_peg,
                'tgl_masuk' => $request->tgl_masuk,
                'awal_kontrak' => $request->awal_kontrak,
                'akhir_kontrak' => $request->akhir_kontrak,

                'tmpt_lahir' => $request->tmpt_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'pend_trkhr' => $request->pend_trkhr,
                'jurusan' => $request->jurusan,
                'thn_lulus' => $request->thn_lulus,
                'nama_ibu' => $request->nama_ibu,
                'npwp' => $request->npwp,
                'status' => $request->status,
                'jml_ank' => $request->jml_ank,
                'nama_kd' => $request->nama_kd,
                'no_kd' => $request->no_kd,
                'hubungan' => $request->hubungan,
                'pp' => $pp->hashName()
            ]);
        }
        if ($employee) {
            return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data {$validateData['nama']} berhasil");
        } else {
            return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data {$validateData['nama']} gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', Employee::class);
        Storage::disk('local')->delete('/public/foto_profil/' . $employee->pp);
        $employee->delete();

        if ($employee) {
            return redirect()->route('employees.index')->with('alert', "hapus data $employee->nama berhasil");
        } else {
            return redirect()->route('employees.index')->with('alert', "hapus data $employee->nama gagal");
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $employees = Employee::where('nama', 'like', "%" . $search . "%")->paginate(25);

        return view('employees.index', ['employees' => $employees]);
    }

    public function mail(){
        $mailData=[
            'title'=>'Mail dari AMSIS',
            'body'=>'tes email SMTP'
        ];

        Mail::to('wahyupriapurnama@gmail.com')->send(new MyTestMail($mailData));
        dd('email sukses terkirim!');

    }
}
