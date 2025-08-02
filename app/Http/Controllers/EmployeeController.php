<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Subsidiary;
use App\Traits\FileUpload;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

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
            $employees = Employee::Index()->latest()->paginate(100);
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
    public function store(StoreEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        \App\Helpers\LogActivity::addToLog();
        $data = Employee::create($request->validated());

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
            return redirect()->route('employees.index')->with('alert', "Input data $request->nama berhasil");
        } else {
            return redirect()->route('employees.index')->with('alert2', "Input data $request->nama gagal");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $this->authorize('update', $employee);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);
        \App\Helpers\LogActivity::addToLog();

        $role = Auth::user()->role;

        if (in_array($role, ['super-admin', 'holding-admin'])) {
            $subsidiaries = Subsidiary::all();
        } elseif ($role === 'eln-admin') {
            $subsidiaries = Subsidiary::where('id', 2)->get();
        } elseif ($role === 'eln2-admin') {
            $subsidiaries = Subsidiary::where('id', 3)->get();
        } elseif ($role === 'bofi-admin') {
            $subsidiaries = Subsidiary::where('id', 4)->get();
        } elseif ($role === 'rmm-admin') {
            $subsidiaries = Subsidiary::where('id', 6)->get();
        } elseif ($role === 'employee') {
            // ✅ Karyawan hanya bisa lihat subsidiary miliknya sendiri
            $subsidiaries = Subsidiary::where('id', $employee->subsidiary_id)->get();
        } else {
            // fallback: hanya subsidiary default
            $subsidiaries = Subsidiary::where('id', 5)->get();
        }

        return view('employees.edit', compact('employee', 'subsidiaries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $employee->update($request->validated());

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
            return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert', "update data $request->nama berhasil");
        } else {
            return redirect()->route('employees.show', ['employee' => $employee->id])->with('alert2', "update data $request->nama gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', Employee::class);
        \App\Helpers\LogActivity::addToLog();
        $data = Storage::disk('local');
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
            return redirect()->route('employees.index')->with('alert2', "hapus data $employee->nama gagal");
        }
    }

    public function pp($pp)
    {
        return Response::download('storage/foto_profil/' . $pp);
    }
    public function ktp($ktp)
    {

        return Response::download('storage/KTP/' . $ktp);
    }
    public function npwp($npwp)
    {

        return Response::download('storage/NPWP/' . $npwp);
    }
    public function kk($kk)
    {

        return Response::download('storage/Kartu Keluarga/' . $kk);
    }
    public function bpjs_ket($bpjs_ket)
    {

        return Response::download('storage/BPJS Ketenagakerjaan/' . $bpjs_ket);
    }
    public function bpjs_kes($bpjs_kes)
    {

        return Response::download('storage/BPJS Kesehatan/' . $bpjs_kes);
    }

    public function index_pdf()
    {
        $this->authorize('view', Employee::class);
        $employees = Employee::all();
        $subsidiary = Subsidiary::find(1);
        $timestamp = now()->format('d/m/Y H:i:s');
        ini_set('max_execution_time', 500);
        ini_set('memory_limit', '512M');
        $pdf = pdf::loadview('employees.pdf.index', ['employees' => $employees, 'timestamp' => $timestamp, 'subsidiary' => $subsidiary])
            ->setPaper('letter', 'landscape');
        return $pdf->stream('data-karyawan-' . now()->format('d-m-Y') . '.pdf');
    }

    public function index_excel()
    {
        return Excel::download(new EmployeeExport, 'data-karyawan.xlsx');
    }

    public function show_pdf($id)
    {
        $employee = Employee::findOrFail($id);
        $this->authorize('update', $employee);

        $subsidiary = Subsidiary::find($employee->subsidiary_id);

        $employee->tgl_masuk_formatted = Carbon::make($employee->tgl_masuk)?->format('d/m/Y');

        if ($employee->status_peg === 'PKWT') {
            $employee->awal_kontrak_formatted = Carbon::make($employee->awal_kontrak)?->format('d/m/Y');
            $employee->akhir_kontrak_formatted = Carbon::make($employee->akhir_kontrak)?->format('d/m/Y');
        }

        $timestamp = now()->format('d/m/Y H:i:s');

        $filename = 'data-karyawan-' . Str::slug($employee->nama) . '-' . now()->format('d-m-Y') . '.pdf';

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('employees.pdf.show', compact('employee', 'timestamp', 'subsidiary'))
            ->setPaper('letter', 'landscape');

        return $pdf->stream($filename);
    }
}
