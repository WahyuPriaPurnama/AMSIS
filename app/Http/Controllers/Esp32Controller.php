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
    public function store($sensor, $location, $value1, $value2, $value3)
    {

        esp32::create([
            'sensor' => $sensor,
            'location' => $location,
            'value1' => $value1,
            'value2' => $value2,
            'value3' => $value3
        ]);
        return redirect()->back()->with('pesan', 'insert data sukses browwww');
    }

}
