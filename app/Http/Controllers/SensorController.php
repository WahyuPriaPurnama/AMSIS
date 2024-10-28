<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $data = Sensor::latest()->get();
        return view('sensor.index', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request);
        Sensor::create(['suhu' => $request->suhu]);
        redirect()->route('suhu.index');
    }
}
