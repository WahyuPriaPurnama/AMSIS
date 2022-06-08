@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        {{ __('Halo ' . ucfirst(Auth::user()->name) . ', Selamat Datang!') }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text text-center"> List Transaksi</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                                        
                                        @foreach($data as $isi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $isi->nama_customer }}</td>
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
                                                    @elseif ($isi->status === 'Batal')
                                                        <span class="badge bg-danger">Batal</span>
                                                    @else
                                                        <span class="badge bg-secondary">Menunggu Konfirmasi</span>
                                                    @endif
                                                </td>
                                                <td>{{ $isi->keterangan }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger"
                                                            href="{{ '/data_file/' . $isi->file }}">
                                                            File
                                                        </a>
                                                        <a class="btn btn-primary"
                                                            href="editpo/{{ $isi->id }}">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
