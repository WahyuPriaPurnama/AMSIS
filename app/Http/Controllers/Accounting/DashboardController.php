<?php

namespace App\Http\Controllers\Accounting;

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
       

            $po = purchase_order::select('*')->where('status','OK')->get();
    
            return view('accounting.dashboard', ['data' => $po]);
        
    }
}
