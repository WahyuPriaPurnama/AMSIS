<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchase_order;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $ok = purchase_order::where('status', 'OK')->count();
    $pending = purchase_order::where('status', 'Pending')->count();
    $batal = purchase_order::where('status', 'Batal')->count();
    $waiting = purchase_order::where('status', 'Waiting')->count();
    $po = purchase_order::select('*')->orderBy('created_at', 'desc')->paginate(10);
    $customer = purchase_order::select('nama_customer')->groupBy('nama_customer')->get();
    return view('marketing.dashboard', compact('po', 'ok', 'pending', 'batal', 'waiting', 'customer'));
  }

  public function inputpo(Request $request)
  {
    $this->validate($request, [
      'file' => 'required|mimes:jpeg,png,jpg,pdf',
    ]);

    $file = $request->file('file');
    $namafile = time() . "_" . $file->getClientOriginalName();
    $folder = 'data_file';
    $file->move($folder, $namafile);

    purchase_order::create([
      'nama_customer' => $request->nama_customer,
      'nomor' => $request->nomor,
      'tanggal' => $request->tanggal,
      'item' => $request->item,
      'harga' => $request->harga,
      'kuantitas' => $request->kuantitas,
      'total' => $request->total,
      'status' => 'Waiting',
      'file' => $namafile,
    ]);

    return redirect()->back()->with('status', 'upload sukses!');
  }

  public function updatepo(Request $request)
  {


    DB::table('purchase_orders')->where('id', $request->id)->update([
      'nama_customer' => $request->nama_customer,
      'nomor' => $request->nomor,
      'tanggal' => $request->tanggal,
      'item' => $request->item,
      'harga' => $request->harga,
      'kuantitas' => $request->kuantitas,
      'total' => $request->total,

    ]);
    return redirect()->back()->with('status', 'update berhasil!');
  }
}
