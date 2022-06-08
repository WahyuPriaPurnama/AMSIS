@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header text-center">BON PENGIRIMAN BARANG</div>
            <div class="card-body">
                <form action="{{ route('proses_bon') }}" method="get">
                    @foreach ($bon as $item)
                        {{ csrf_field() }}
                        <div class="row align-items-start">
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kepada" value="{{$item->nama_customer}}" name="kepada"
                                        placeholder="Kepada Yth.">
                                    <label for="kepada">Kepada Yth.</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nomor" name="nomor_bon"
                                        placeholder="Nomor">
                                    <label for="nomor">Nomor</label>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row align-items-start">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Dari:</label>
                                    </div>
                                    <select class="form-control" id="inputGroupSelect01" name="dari">
                                        <option selected>Pilih</option>
                                        <option value="PT. ENERGY LAUTAN NUSANTARA">PT. ENERGY LAUTAN NUSANTARA</option>
                                        <option value="CV. ANUGERAH MULIA SEJAHTERA">CV. ANUGERAH MULIA SEJAHTERA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="berat" name="berat"
                                        placeholder="Berat Bruto">
                                    <label for="berat">Berat Bruto</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row align-items-start">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="notruck" name="no_plat"
                                        placeholder="Nomor Truk">
                                    <label for="notruck">Nomor Truk</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="perusahan-angkutan"
                                        name="perusahaan_angkutan" placeholder="Perusahaan Angkutan">
                                    <label for="perusahaan-angkutan">Perusahaan Angkutan</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table">
                            <thead style="text-align: center">
                                <tr>
                                    <th scope="col">MACAM BARANG</th>
                                    <th scope="col">NOMOR</th>
                                    <th scope="col">BANYAKNYA</th>
                                    <th scope="col">SATUAN</th>
                                    <th scope="col">KETERANGAN</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea class="form-control" rows="10" name="nama_barang"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="nomor"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="banyaknya"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="satuan"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="10" name="keterangan"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                        <div class="row" style="margin-left: 60%">
                            <div class="col">
                                <input type="text" name="kota" class="form-control">
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                        </div>
                        <div class="row" style="text-align:center;margin:5%">
                            <div class="col">
                                Tanda Terima / Cap
                            </div>
                            <div class="col">
                                Mengetahui<br>Pem. Perusahaan / Cap
                            </div>
                            <div class="col">
                                Tanda Tangan
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-danger">PDF</button>
                        </div>
                        @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
