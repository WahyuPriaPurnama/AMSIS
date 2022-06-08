<?php

namespace App\Http\Controllers\Gudang;

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
        $stock = stock::select('*')->get();
        $po = purchase_order::select('*')->paginate(10);
        return view('gudang.dashboard', compact('stock', 'po'));
    }
    public function inputsj($id)
    {
        $sj = purchase_order::all()->where('id',$id);
        return view('gudang.inputsj', compact('sj'));
    }

    public function inputbon($id){
        $bon=purchase_order::all()->where('id',$id);
        return view('gudang.inputbon',compact('bon'));
    }


    public function inputstock(Request $request)
    {
        stock::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan

        ]);
        return redirect()->back();
    }


    public function updatestock(Request $request)
    {
        DB::table('stocks')->where('id', $request->id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan
        ]);
        return redirect()->back();
    }
    public function bonpdf(Request $request)
    {
        //BON
        $kepada = $request->input('kepada');
        $nomor_bon = $request->input('nomor_bon');
        $dari = $request->input('dari');
        $berat = $request->input('berat');
        $no_plat = $request->input('no_plat');
        $perusahaan_angkutan = $request->input('perusahaan_angkutan');
        $nama_barang = $request->input('nama_barang');
        $nomor = $request->input('nomor');
        $banyaknya = $request->input('banyaknya');
        $satuan = $request->input('satuan');
        $harga_satuan = $request->input('harga_satuan');
        $jumlah_harga = $request->input('jumlah_harga');
        $keterangan = $request->input('keterangan');
        $kota = $request->input('kota');
        $tanggal = $request->input('tanggal');

        $pdf = new Dompdf();
        $pdf->loadHtml(view('gudang.bon', compact(
            'kepada',
            'nomor_bon',
            'dari',
            'berat',
            'no_plat',
            'perusahaan_angkutan',
            'nama_barang',
            'nomor',
            'banyaknya',
            'satuan',
            'harga_satuan',
            'jumlah_harga',
            'keterangan',
            'kota',
            'tanggal',
        )));
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $pdf->setOptions($options);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream('Bon Pengiriman Barang-' . $nomor_bon . '-' . $kepada . '.pdf', ['Attachment' => false]);
    }


    public function sjpdf(Request $request)
    {
        $dari_sj = $request->input('dari_sj');
        $kepada_sj = $request->input('kepada_sj');
        $nomor_sj = $request->input('nomor_sj');
        $no_sj = $request->input('no_sj');
        $nama_barang_sj = $request->input('nama_barang_sj');
        $uraian_sj = $request->input('uraian_sj');
        $jml_sj = $request->input('jml_sj');
        $satuan_sj = $request->input('satuan_sj');
        $no_bpb_sj = $request->input('no_bpb_sj');
        $keterangan_sj = $request->input('keterangan_sj');
        $kota_sj = $request->input('kota_sj');
        $tanggal_sj = $request->input('tanggal_sj');


        $pdf = new Dompdf();
        $pdf->loadHtml(view('gudang.suratjalan', compact(
            'dari_sj',
            'kepada_sj',
            'nomor_sj',
            'no_sj',
            'nama_barang_sj',
            'uraian_sj',
            'jml_sj',
            'satuan_sj',
            'no_bpb_sj',
            'keterangan_sj',
            'kota_sj',
            'tanggal_sj'
        )));
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $pdf->setOptions($options);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream('Surat Jalan-' . $nomor_sj . '-' . $kepada_sj . '.pdf', ['Attachment' => false]);
    }
}
