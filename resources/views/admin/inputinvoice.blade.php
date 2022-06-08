@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
           
            <div class="card-header text-center">
                INVOICE
            </div>
            <div class="card-body">
                <form action="{{ route('proses_inv') }}">
                    @foreach ($data as $item)
                    <div class="row">
                        <div class="col">
                            <h3> PROVORMA INVOICE</h3>
                            <div class="form-floating" style="width: 30%;">
                                <input type="text" class="form-control" id="no_inv" name="no_inv"
                                    placeholder="Nomor Invoice">
                                <label for="no_inv">Nomor Invoice</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        
                        <div class="col">

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="customer" name="customer"
                                        value="{{ $item->nama_customer }}" placeholder="Customer">
                                    <label for="customer">Nama Customer</label>
                                </div>
                          
                        </div>

                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                <label for="alamat">Alamat</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP">
                                <label for="npwp">NPWP</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="no_po" name="no_po" value="{{$item->nomor}}"
                                    placeholder="Nomor Purchase Order">
                                <label for="no_po">Nomor Purchase Order</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th style="width:10px">NO</th>
                                <th>ITEM</th>
                                <th>JUMLAH</th>
                                <th>SATUAN</th>
                                <th>HARGA</th>
                                <th>JUMLAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="number"  name="no" value="1" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="item" value="{{$item->item}}" class="form-control"
                                        placeholder="misal TFS / Tinplate.." required>
                                </td>
                                <td>
                                    <input type="number" value="{{$item->kuantitas}}" name="jumlah" class="form-control" onblur="sum()"
                                        placeholder="jumlah item..." id="jumlah" required>
                                </td>
                                <td>
                                    <input type="text" name="satuan" class="form-control" placeholder="satuan...">
                                </td>
                                <td>
                                    <input type="number" name="harga" id="harga" onblur="sum()" class="form-control"
                                        placeholder="harga item..">
                                </td>
                                <td>
                                    <input type="number" id="harga_total" name="harga_total" class="form-control"
                                        placeholder="total...">
                                </td>
                                <td>
                                    <button type="button" onclick="tambahBaris()" class="btn btn-success"> tambah
                                        baris</button>
                                    <button type="button" onclick="hapusBaris()" class="btn btn-success"> hapus
                                        baris</button>
                                </td>

                                <script>
                                    function sum() {
                                        var kuantitas = parseInt(document.getElementById("jumlah").value);
                                        var harga = parseInt(document.getElementById("harga").value);
                                        document.getElementById("harga_total").value = kuantitas * harga;
                                    }

                                    function tambahBaris() {
                                        var table = document.getElementById("myTable");

                                        table.innerHtml += `
                                        <td>
                                    <input type="number"  name="no" value="1" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="item" value="{{$item->item}}" class="form-control"
                                        placeholder="misal TFS / Tinplate.." required>
                                </td>
                                <td>
                                    <input type="number" value="{{$item->kuantitas}}" name="jumlah" class="form-control" onblur="sum()"
                                        placeholder="jumlah item..." id="jumlah" required>
                                </td>
                                <td>
                                    <input type="text" name="satuan" class="form-control" placeholder="satuan...">
                                </td>
                                <td>
                                    <input type="number" name="harga" id="harga" onblur="sum()" class="form-control"
                                        placeholder="harga item..">
                                </td>
                                <td>
                                    <input type="number" id="harga_total" name="harga_total" class="form-control"
                                        placeholder="total...">
                                </td>
                                <td>
                                    <button type="button" onclick="tambahBaris()" class="btn btn-success"> tambah
                                        baris</button>
                                    <button type="button" onclick="hapusBaris()" class="btn btn-success"> hapus
                                        baris</button>
                                </td>
                                        `
                                        // var row = table.insertRow(0);
                                        // var cell1 = row.insertCell(0);
                                        // var cell2 = row.insertCell(0);
                                        // var cell3 = row.insertCell(0);
                                        // var cell4 = row.insertCell(0);
                                        // var cell5 = row.insertCell(0);
                                        // var cell6 = row.insertCell(1);


                                        // cell1.innerHTML = '<td><input type="number" name="no" value="1" class="form-control"></td>';
                                        // cell2.innerHTML =
                                        //     '<td><input type="text" name="item" class="form-control"placeholder="misal TFS / Tinplate.." required> </td>';
                                        // cell3.innerHTML =
                                        //     '<input type="number" name="jumlah" class="form-control" onblur="sum()" placeholder="jumlah item..." id="jumlah" required>';
                                        // cell4.innerHTML = '<input type="text" name="satuan" class="form-control" placeholder="satuan...">';
                                        // cell5.innerHTML =
                                        //     '<input type="number" name="harga" id="harga" onblur="sum()" class="form-control" placeholder="harga item..">';
                                        // cell6.innerHTML =
                                        //     '<input type="number" id="harga_total" name="harga_total" class="form-control" placeholder="total...">';
                                    }

                                    function hapusBaris() {
                                        document.getElementById("myTable").deleteRow(0);
                                    }
                                </script>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <h3 class="text-center">TOTAL</h3>
                                </td>
                                <td><input type="text" class="form-control" name="total"></td>
                                <td colspan="2"><input id="total_harga" type="text" class="form-control"
                                        name="harga_total2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <div style="width: 50%">
                                Jumlah: <input type="text" class="form-control" name="jumlah2" placeholder="Jumlah">
                                PPN: <input type="text" class="form-control" name="ppn" placeholder="PPN">
                                TOTAL: <input type="text" class="form-control" name="harga_total3"
                                    placeholder="harga_total">
                            </div>
                            Terbilang: <input type="text" class="form-control" name="terbilang"
                                placeholder="jumlah terbilang">
                            NOTE: <input type="text" class="form-control" name="jatuh_tempo" placeholder="catatan"><br>
                        </div>


                        <div class="col">
                            <b>
                                <h3>PEMBAYARAN:</h3>
                            </b><br>
                            BANK: <select name="bank" id="" class="form-select">
                                <option value="BRI CAB. KRIAN">BRI CAB. KRIAN</option>
                                <option value="1">satu</option>
                                <option value="2">dua</option>
                                <option value="3">tiga</option>
                            </select>
                            NO. REK: <select name="norek" class="form-select" id="">
                                <option value="0553-01-0000549-30-8">0553-01-0000549-30-8</option>
                                <option value="">No. Rek 1</option>
                                <option value="">No. Rek 2</option>
                                <option value="">No. Rek 3</option>
                            </select>

                            A/N: <select name="atas_nama" id="" class="form-select">
                                <option value="CV. ANUGERAH MULIA SEJAHTERA">CV. ANUGERAH MULIA SEJAHTERA</option>
                                <option value="PT. ENERGY LAUTAN NUSANTARA">PT. ENERGY LAUTAN NUSANTARA</option>
                                <option value="">An. .....</option>
                                <option value="">An ......</option>
                            </select>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="lokasi" class="form-control" placeholder="misal:Malang">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="tanggal">
                                </div>

                            </div><br>
                            <input type="text" name="nama" placeholder="misal:Ade Ayu Santi" class="form-control">
                        </div>
                    </div>
                    @endforeach
            </div>
            <button type="submit" class="btn btn-danger">PDF</button>
            </form>
        </div>
    </div>
@endsection
