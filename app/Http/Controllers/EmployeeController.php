<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Mail\MyTestMail;
use App\Models\Employee;
use App\Models\Subsidiary;
use App\Traits\FileUpload;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', Employee::class);
        $user = Auth::user()->role;
        if (($user == 'super-admin') or ($user == 'holding-admin')) {
            $employees = Employee::Index()->sortable()->latest()->paginate(100);
        } elseif ($user == 'eln-admin') {
            $employees = Employee::whereHas('subsidiary', function ($query) {
                return $query->where('id', '2');
            })->sortable()->latest()->paginate(100);
        } elseif ($user == 'eln2-admin') {
            $employees = Employee::whereHas('subsidiary', function ($query) {
                return $query->where('id', '3');
            })->sortable()->latest()->paginate(100);
        } elseif ($user == 'bofi-admin') {
            $employees = Employee::whereHas('subsidiary', function ($query) {
                return $query->where('id', '4');
            })->sortable()->latest()->paginate(100);
        } elseif ($user == 'rmm-admin') {
            $employees = Employee::whereHas('subsidiary', function ($query) {
                return $query->where('id', '6');
            })->sortable()->latest()->paginate(100);
        } else {
            $employees = Employee::whereHas('subsidiary', function ($query) {
                return $query->where('id', '5');
            })->sortable()->latest()->paginate(100);
        }

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Employee::class);
        $user = Auth::user()->role;
        if (($user == 'super-admin') or ($user == 'holding-admin')) {
            $subsidiaries = Subsidiary::all();
        } elseif ($user == 'eln-admin') {
            $subsidiaries = Subsidiary::where('id', '2')->get();
        } elseif ($user == 'eln2-admin') {
            $subsidiaries = Subsidiary::where('id', '3')->get();
        } elseif ($user == 'bofi-admin') {
            $subsidiaries = Subsidiary::where('id', '4')->get();
        } elseif ($user == 'rmm-admin') {
            $subsidiaries = Subsidiary::where('id', '6')->get();
        } else {
            $subsidiaries = Subsidiary::where('id', '5')->get();
        }
        return view('employees.create', compact('subsidiaries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        \App\Helpers\LogActivity::addToLog();
        $data = Employee::create($request->all());

        if ($request->file('pp')) {
            $pp = $this->fileUpload($request, 'public/foto_profil', 'pp');
            $data->update(['pp' => $pp->hashName()]);
        }

        if ($request->file('ktp')) {
            $ktp = $this->fileUpload($request, 'public/KTP', 'ktp');
            $data->update(['ktp' => $ktp->hashName()]);
        }

        if ($request->file('npwp2')) {
            $npwp = $this->fileUpload($request, 'public/NPWP', 'npwp2');
            $data->update(['npwp2' => $npwp->hashName()]);
        }

        if ($request->file('kk')) {
            $kk = $this->fileUpload($request, 'public/Kartu Keluarga', 'kk');
            $data->update(['kk' => $kk->hashName()]);
        }

        if ($request->file('bpjs_kes')) {
            $bpjs_kes = $this->fileUpload($request, 'public/BPJS Kesehatan', 'bpjs_kes');
            $data->update(['bpjs_kes' => $bpjs_kes->hashName()]);
        }

        if ($request->file('bpjs_ket')) {
            $bpjs_ket = $this->fileUpload($request, 'public/BPJS Ketenagakerjaan', 'bpjs_ket');
            $data->update(['bpjs_ket' => $bpjs_ket->hashName()]);
        }



        if ($data) {
            return redirect()->route('employees.index')->with('alert', "Input data berhasil");
        } else {
            return redirect()->route('employees.index')->with('alert', "Input data gagal");
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
        $user = Auth::user()->role;
        if (($user == 'super-admin') or ($user == 'holding-admin')) {
            $subsidiaries = Subsidiary::all();
        } elseif ($user == 'eln-admin') {
            $subsidiaries = Subsidiary::where('id', '2')->get();
        } elseif ($user == 'eln2-admin') {
            $subsidiaries = Subsidiary::where('id', '3')->get();
        } elseif ($user == 'bofi-admin') {
            $subsidiaries = Subsidiary::where('id', '4')->get();
        } elseif ($user == 'rmm-admin') {
            $subsidiaries = Subsidiary::where('id', '6')->get();
        } else {
            $subsidiaries = Subsidiary::where('id', '5')->get();
        }
        return view('employees.edit', compact(['employee', 'subsidiaries']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $this->authorize('update', Employee::class);
        \App\Helpers\LogActivity::addToLog();
        $request->validate([
            'nip' => 'size:9|unique:employees,nip,' . $employee->id,
            'nama' => 'min:3|max:50',
            'nik' => 'size:16|unique:employees,nik,' . $employee->id,
            'subsidiary_id' => '',
            'divisi' => 'max:20',
            'departemen' => 'max:20',
            'seksi' => 'max:20',
            'posisi' => '',
            'status_peg' => '',
            'tgl_masuk' => '',
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
            'pp' => 'mimes:png,jpg,jpeg|max:2048',
            'ktp' => 'mimes:pdf|max:2048',
            'kk' => 'mimes:pdf|max:2048',
            'npwp2' => 'mimes:pdf|max:2048',
            'bpjs_kes' => 'mimes:pdf|max:2048',
            'bpjs_ket' => 'mimes:pdf|max:2048',
        ]);

        $employee = Employee::findOrFail($employee->id);

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

        if ($request->file('pp')) {
            Storage::disk('local')->delete('public/foto_profil/' . $employee->pp);
            $pp = $this->fileUpload($request, 'public/foto_profil/', 'pp');
            $employee->update(['pp' => $pp->hashName()]);
        }
        if ($request->file('ktp')) {
            Storage::disk('local')->delete('public/KTP/' . $employee->ktp);
            $ktp = $this->fileUpload($request, 'public/KTP/', 'ktp');
            $employee->update(['ktp' => $ktp->hashName()]);
        }
        if ($request->file('npwp2')) {
            Storage::disk('local')->delete('public/NPWP/' . $employee->npwp2);
            $npwp = $this->fileUpload($request, 'public/NPWP/', 'npwp2');
            $employee->update(['npwp2' => $npwp->hashName()]);
        }

        if ($request->file('kk')) {
            Storage::disk('local')->delete('public/Kartu Keluarga/' . $employee->kk);
            $kk = $this->fileUpload($request, 'public/Kartu Keluarga/', 'kk');
            $employee->update(['kk' => $kk->hashName()]);
        }

        if ($request->file('bpjs_kes')) {
            Storage::disk('local')->delete('public/BPJS Kesehatan/' . $employee->bpjs_kes);
            $bpjs_kes = $this->fileUpload($request, 'public/BPJS Kesehatan/', 'bpjs_kes');
            $employee->update(['bpjs_kes' => $bpjs_kes->hashName()]);
        }

        if ($request->file('bpjs_ket')) {
            Storage::disk('local')->delete('public/BPJS Ketenagakerjaan/' . $employee->kbpjs_ket);
            $bpjs_ket = $this->fileUpload($request, 'public/BPJS Ketenagakerjaan/', 'bpjs_ket');
            $employee->update(['bpjs_ket' => $bpjs_ket->hashName()]);
        }

        if ($employee) {
            return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data berhasil");
        } else {
            return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data  gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', Employee::class);
        \App\Helpers\LogActivity::addToLog();
        $data=Storage::disk('local');
        $data->delete('/public/foto_profil/' . $employee->pp);
        $data->delete('/public/Kartu Keluarga/' . $employee->kk);
        $data->delete('/public/BPJS Kesehatan/' . $employee->bpjs_kes);
        $data->delete('/public/BPJS Ketenagakerjaan/' . $employee->bpjs_ket);
        $data->delete('/public/KTP/' . $employee->ktp);
        $data->delete('/public/NPWP/' . $employee->npwp2);

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

    public function mail()
    {
        $mailData = [
            'title' => 'Mail dari AMSIS',
            'body' => 'tes email SMTP'
        ];

        Mail::to('wahyupriapurnama@gmail.com')->send(new MyTestMail($mailData));
        dd('email sukses terkirim!');
    }

    public function pp($pp)
    {
        $this->authorize('view', Employee::class);
        return Response::download('storage/foto_profil/' . $pp);
    }
    public function ktp($ktp)
    {
        $this->authorize('view', Employee::class);
        return Response::download('storage/KTP/' . $ktp);
    }
    public function npwp($npwp)
    {
        $this->authorize('view', Employee::class);
        return Response::download('storage/NPWP/' . $npwp);
    }
    public function kk($kk)
    {
        $this->authorize('view', Employee::class);
        return Response::download('storage/Kartu Keluarga/' . $kk);
    }
    public function bpjs_ket($bpjs_ket)
    {
        $this->authorize('view', Employee::class);
        return Response::download('storage/BPJS Ketenagakerjaan/' . $bpjs_ket);
    }
    public function bpjs_kes($bpjs_kes)
    {
        $this->authorize('view', Employee::class);
        return Response::download('storage/BPJS Kesehatan/' . $bpjs_kes);
    }

    public function index_pdf()
    {
        $this->authorize('view', Employee::class);
        $employees = Employee::all();
        $pdf = pdf::loadview('employees.pdf.index', ['employees' => $employees])->setPaper('letter', 'landscape');
        return $pdf->stream();
    }

    public function show_pdf($employee)
    {
        $this->authorize('view', Employee::class);
        $result = Employee::find($employee);
        $pdf = pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('employees.pdf.show', ['employee' => $result])->setPaper('letter', 'landscape');
        return $pdf->stream();
    }
}
