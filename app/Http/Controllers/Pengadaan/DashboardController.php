<?php

namespace App\Http\Controllers\Pengadaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchase_order;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('pengadaan.dashboard');
    }
    public function tampilpopengadaan()
    {
        $po = purchase_order::select('*')->get();
        return view('pengadaan.tampilpo', ['data' => $po]);
    }
}
