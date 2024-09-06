<?php

namespace App\Http\Controllers;

use App\Models\esp32;
use Illuminate\Http\Request;

class Esp32Controller extends Controller
{
    public function index()
    {

        $data = esp32::all();

        return view('esp32.index', compact('data'));
    }
    public function store($suhu)
    {

        $data = esp32::create([
            'suhu' => $suhu
        ]);
        return 'Data berhasil disimpan';
    }
}
