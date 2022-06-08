<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customer;

class customerController extends Controller
{
  public function index()
  {
    $data = customer::all();
    return view('customer', compact('data'));
  }

  public function simpancust(Request $request)
  {
    customer::create([
      'nama' => strtoupper($request->nama),
      'alamat' => $request->alamat,
      'email' => $request->email,
      'no_telp' => $request->no_telp
    ]);
    return redirect()->back();
  }

  public function updatecust(Request $request)
  {
    DB::table('customers')->where('id', $request->id)->update([
      'nama' => strtoupper($request->nama),
      'alamat' => $request->alamat,
      'email' => $request->email,
      'no_telp' => $request->no_telp,
    ]);
    return redirect()->back();
  }

  public function hapuscust($id)
  {
    DB::table('customers')->where('id', $id)->delete();
    return redirect()->back();
  }
}
