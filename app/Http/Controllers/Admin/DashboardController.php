<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\purchase_order;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;

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
    return view('admin.dashboard', compact('data', 'stock'));
  }

  public function input_inv($id)
  {
    $data=purchase_order::all()->where('id',$id);
    return view('admin.inputinvoice',compact('data'));
  }

  public function updatestatuspo(Request $request)
  {
    DB::table('purchase_orders')->where('id', $request->id)->update([
      'status' => $request->status,
      'keterangan' => $request->keterangan,
    ]);
    return redirect()->back()->with('status', 'update sukses');
  }


  public function proses_inv(Request $request)
  {
    $no_inv = $request->input('no_inv');
    $customer = $request->input('customer');
    $alamat = $request->input('alamat');
    $npwp = $request->input('npwp');
    $no_po = $request->input('no_po');
    $no = $request->input('no');
    $item = $request->input('item');
    $jumlah = $request->input('jumlah');
    $satuan = $request->input('satuan');
    $harga = $request->input('harga');
    $harga_total = $request->input('harga_total');
    $total = $request->input('total');
    $harga_total2 = $request->input('harga_total2');
    $jumlah2 = $request->input('jumlah2');
    $ppn = $request->input('ppn');
    $harga_total3 = $request->input('harga_total3');
    $terbilang = $request->input('terbilang');
    $jatuh_tempo = $request->input('jatuh_tempo');
    $bank = $request->input('bank');
    $norek = $request->input('norek');
    $an = $request->input('atas_nama');
    $lokasi = $request->input('lokasi');
    $tgl = $request->input('tanggal');
    $nama = $request->input('nama');

    $pdf = new Dompdf();
    $pdf->loadHtml(view('admin.invoice', compact(
      'no_inv',
      'customer',
      'alamat',
      'npwp',
      'no_po',
      'no',
      'item',
      'jumlah',
      'satuan',
      'harga',
      'harga_total',
      'total',
      'harga_total2',
      'jumlah2',
      'ppn',
      'harga_total3',
      'terbilang',
      'jatuh_tempo',
      'bank',
      'an',
      'lokasi',
      'tgl',
      'nama',
      'norek'
    )));
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $pdf->setOptions($options);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('Invoice -' . $no_inv . '-' . $customer . '.pdf', ['Attachment' => false]);
  }
}
