@extends('layouts.app')
@section('title', 'Riwayat')
@section('menuHistory', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 text-center">
            <h2>RIWAYAT KELUAR-MASUK BARANG</h2>
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>TANGGAL</th>
                        <th>KATEGORI</th>
                        <th>KODE</th>
                        <th>NAMA BARANG</th>
                        <th>JUMLAH</th>
                        <th>USER</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $h)
                        <tr>
                            <td>{{ $h->created_at }}</td>
                            <td>{{ $h->category }}</td>
                            <td>{{ $h->code }}</td>
                            <td>{{ $h->name }}</td>
                            <td>{{ $h->qty }}</td>
                            <td>{{ $h->user }}</td>
                        </tr>
                    @empty
                        <td colspan="6" class="text-center">
                            tidak ada data...
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
