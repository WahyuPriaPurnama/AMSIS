<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TagList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function addMore()
    {
        return view('addMore');
    }
    public function addMorePost(Request $request)
    {
        $rules = [];
        foreach ($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {
            foreach ($request->input('name') as $key => $value) {
                TagList::create(['name' => $value]);
            }
            return response()->json(['success' => 'done']);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }
}
