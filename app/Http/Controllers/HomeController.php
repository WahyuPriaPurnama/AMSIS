<?php

namespace App\Http\Controllers;

use App\Models\Employee;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->authorize('view', Employee::class);
        $ams = Employee::where('subsidiary_id', 1)->count();
        $eln1 = Employee::where('subsidiary_id', 2)->count();
        $eln2 = Employee::where('subsidiary_id', 3)->count();
        $bofi = Employee::where('subsidiary_id', 4)->count();
        $hk = Employee::where('subsidiary_id', 5)->count();
        $rmm = Employee::where('subsidiary_id', 6)->count();

        return view('home', compact('ams', 'eln1', 'eln2', 'bofi', 'hk', 'rmm'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \App\Helpers\LogActivity::logActivityLists();
        return view('logActivity', compact('logs'));
    }

    
}
