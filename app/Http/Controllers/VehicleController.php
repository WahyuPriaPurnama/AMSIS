<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Subsidiary;
use App\Models\Vehicle;
use App\Traits\FileUpload;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $this->authorize('create', Vehicle::class);
        $data = Vehicle::Index()->paginate(50);
        return view('vehicles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vehicle::class);
        $sub = Subsidiary::all();
        return view('vehicles.create', compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $this->authorize('create', Vehicle::class);
        \App\Helpers\LogActivity::addToLog();
        $data = Vehicle::create($request->validated());
        if ($request->file('foto')) {
            $foto = $this->fileUpload($request, 'public/vehicles/foto', 'foto');
            $data->update(['foto' => $foto->hashName()]);
        }
        if ($request->file('f_stnk')) {
            $stnk = $this->fileUpload($request, 'public/vehicles/stnk', 'f_stnk');
            $data->update(['f_stnk' => $stnk->hashName()]);
        }
        if ($request->file('f_pajak')) {
            $pajak = $this->fileUpload($request, 'public/vehicles/pajak', 'f_pajak');
            $data->update(['f_pajak' => $pajak->hashName()]);
        }
        if ($request->file('f_kir')) {
            $kir = $this->fileUpload($request, 'public/vehicles/kir', 'f_kir');
            $data->update(['f_kir' => $kir->hashName()]);
        }
        if ($request->file('qr')) {
            $qr = $this->fileUpload($request, 'public/vehicles/qr', 'qr');
            $data->update(['qr' => $qr->hashName()]);
        }
        if ($request->file('f_polis')) {
            $polis = $this->fileUpload($request, 'public/vehicles/polis', 'f_polis');
            $data->update(['f_polis' => $polis->hashName()]);
        }
        if ($request->file('f_service')) {
            $service = $this->fileUpload($request, 'public/vehicles/service', 'f_service');
            $data->update(['f_service' => $service->hashName()]);
        }
        return redirect()->route('vehicles.index')->with('alert', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $sub = Subsidiary::all();
        return view('vehicles.edit', compact('sub', 'vehicle'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $this->authorize('update', Vehicle::class);
        $vehicle::findOrFail($vehicle->id);
        $vehicle->update($request->validated());

        if ($request->file('foto')) {
            Storage::disk('local')->delete('public/vehicles/foto' . $vehicle->foto);
            $foto = $this->fileUpload($request, 'public/vehicles/foto', 'foto');
            $vehicle->update(['foto' => $foto->hashName()]);
        }
        if ($request->file('f_stnk')) {
            Storage::disk('local')->delete('public/vehicles/stnk' . $vehicle->stnk);
            $stnk = $this->fileUpload($request, 'public/vehicles/stnk', 'f_stnk');
            $vehicle->update(['f_stnk' => $stnk->hashName()]);
        }
        if ($request->file('f_pajak')) {
            Storage::disk('local')->delete('public/vehicles/pajak' . $vehicle->f_pajak);
            $pajak = $this->fileUpload($request, 'public/vehicles/pajak', 'f_pajak');
            $vehicle->update(['f_pajak' => $pajak->hashName()]);
        }

        if ($request->file('f_kir')) {
            Storage::disk('local')->delete('public/vehicles/kir/' . $vehicle->f_kir);
            $kir = $this->fileUpload($request, 'public/vehicles/kir', 'f_kir');
            $vehicle->update(['f_kir' => $kir->hashName()]);
        }

        if ($request->file('qr')) {
            Storage::disk('local')->delete('public/vehicles/qr/' . $vehicle->qr);
            $qr = $this->fileUpload($request, 'public/vehicles/qr', 'qr');
            $vehicle->update(['qr' => $qr->hashName()]);
        }
        if ($request->file('f_polis')) {
            Storage::disk('local')->delete('public/vehicles/polis/' . $vehicle->f_polis);
            $polis = $this->fileUpload($request, 'public/vehicles/polis', 'f_polis');
            $vehicle->update(['f_polis' => $polis->hashName()]);
        }
        if ($request->file('f_service')) {
            Storage::disk('local')->delete('public/vehicles/service/' . $vehicle->f_service);
            $service = $this->fileUpload($request, 'public/vehicles/service', 'f_service');
            $vehicle->update(['f_service' => $service->hashName()]);
        }

        return redirect()->route('vehicles.show', ['vehicle' => $vehicle->id])
            ->with($vehicle ? 'alert' : 'alert2', $vehicle ? 'update data berhasil' : 'update data gagal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $this->authorize('delete', Vehicle::class);
        $data = Storage::disk('local');
        $data->delete('/public/vehicles/foto/' . $vehicle->foto);
        $data->delete('/public/vehicles/stnk/' . $vehicle->stnk);
        $data->delete('/public/vehicles/pajak/' . $vehicle->pajak);
        $data->delete('/public/vehicles/kir/' . $vehicle->kir);
        $data->delete('/public/vehicles/qr/' . $vehicle->qr);
        $data->delete('/public/vehicles/polis/' . $vehicle->polis);
        $data->delete('/public/vehicles/service/' . $vehicle->f_service);
        $vehicle->delete();

        return redirect()->route('vehicles.index')
            ->with(
                $vehicle ? 'alert' : 'alert2',
                "hapus data {$vehicle->jenis_kendaraan} " . ($vehicle ? 'berhasil' : 'gagal')
            );
    }

    public function foto($foto)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/foto/' . $foto);
    }

    public function stnk($stnk)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/stnk/' . $stnk);
    }

    public function pajak($pajak)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/pajak/' . $pajak);
    }

    public function kir($kir)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/kir/' . $kir);
    }

    public function qr($qr)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/qr/' . $qr);
    }

    public function polis($polis)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/polis/' . $polis);
    }
    public function service($service)
    {
        $this->authorize('view', Vehicle::class);
        return Response::download('storage/vehicles/service/' . $service);
    }

    public function index_pdf()
    {
        $this->authorize('view', Vehicle::class);
        $vehicles = Vehicle::all();
        $subsidiary = Subsidiary::find(1);
        $timestamp = now()->format('d/m/Y H:i:s');
        ini_set('max_execution_time', 500);
        ini_set('memory_limit', '512M');
        $pdf = pdf::loadview('vehicles.pdf.index', ['vehicles' => $vehicles, 'timestamp' => $timestamp, 'subsidiary' => $subsidiary])
            ->setPaper('letter', 'landscape');
        return $pdf->stream('data-kendaraan-' . now()->format('d-m-Y') . '.pdf');
    }

    public function show_pdf($id)
    {
        $this->authorize('view', Vehicle::class);
        $vehicle = Vehicle::findOrFail($id);
        $subsidiary = Subsidiary::find($vehicle->subsidiary_id);
        $timestamp = now()->format('d-m-Y H:i:s');
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('vehicles.pdf.show', ['vehicle' => $vehicle, 'subsidiary' => $subsidiary, 'timestamp' => $timestamp])->setPaper('letter', 'landscape');
        return $pdf->stream('data-kendaraan-' . $vehicle->jenis_kendaraan . '-' . now()->format('d-m-Y') . '.pdf');
    }
}
