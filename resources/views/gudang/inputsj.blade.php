@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header text-center">
                SURAT JALAN PENGIRIMAN BARANG
            </div>
            <div class="card-body">
                <form action="{{ route('proses_sj') }}" method="get">
                    @foreach ($sj as $item)
                        <div class="row align-items-start">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Dari:</label>
                                    </div>
                                    <select class="form-control" id="inputGroupSelect01" name="dari_sj">
                                        <option selected>Pilih</option>
                                        <option value="CV. ANUGERAH MULIA SEJAHTERA">CV. ANUGERAH MULIA SEJAHTERA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kepadasj"
                                        value="{{ $item->nama_customer }}" name="kepada_sj" placeholder="Kepada Yth.">
                                    <label for="kepadasj">Kepada Yth.</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nomorsj" name="nomor_sj"
                                        placeholder="Nomor">
                                    <label for="nomorsj">Nomor</label>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead style="text-align: center">
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NAMA BARANG</th>
                                    <th scope="col">URAIAN</th>
                                    <th scope="col">JUMLAH</th>
                                    <th scope="col">SATUAN</th>
                                    <th scope="col">NO. BPB</th>
                                    <th scope="col">KETERANGAN</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea class="form-control" name="no_sj" cols="1" rows="10"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="nama_barang_sj"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="uraian_sj"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="jml_sj"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="satuan_sj" rows="10"></textarea>
                                    </td>

                                    <td>
                                        <textarea class="form-control" rows="10" name="no_bpb_sj"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="keterangan_sj"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                        <div class="row" style="margin-left: 60%">
                            <div class="col">
                                <input type="text" name="kota_sj" class="form-control">
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" name="tanggal_sj">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Dapatkan PDF</button>
                    @endforeach
            </div>
            </form>
        </div>
    </div>
@endsection
