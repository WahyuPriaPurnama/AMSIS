<?php

namespace App\Http\Controllers\Direksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\purchase_order;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = purchase_order::select('*')->orderBy('created_at', 'desc')->paginate(10);
        $stock = stock::select('*')->get();
        return view('direksi.dashboard',compact('data','stock'));
    }

}
