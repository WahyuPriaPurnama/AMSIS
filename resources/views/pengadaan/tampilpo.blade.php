@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="text text-center">
                    <h3>Daftar PO</h3>
                </div>
            </div>
            <div class="text-center">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NAMA CUSTOMER</th>
                                    <th scope="col">NOMOR</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">ITEM</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">KUANTITAS</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">KETERANGAN</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <tbody>
                                @foreach ($data as $isi)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $isi->nama_perusahaan }}</td>
                                        <td>{{ $isi->nomor }}</td>
                                        <td>{{ $isi->tanggal }}</td>
                                        <td>{{ $isi->item }}</td>
                                        <td>{{ $isi->harga }}</td>
                                        <td>{{ $isi->kuantitas }}</td>
                                        <td>{{ $isi->total }}</td>
                                        <td>
                                            @if ($isi->status === 'OK')
                                                <span class="badge bg-success">OK</span>
                                            @elseif ($isi->status === 'Pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($isi->status == 'Batal')
                                                <span class="badge bg-danger">Batal</span>
                                            @else
                                                <span class="badge bg-secondary">Menunggu Konfirmasi</span>
                                            @endif
                                        </td>
                                        <td>{{ $isi->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-primary" href="javascript:history.back()">Kembali</a>
            </div>
        </div>
    </div>
@endsection
