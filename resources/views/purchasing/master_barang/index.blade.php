@extends('layouts.app')
@section('title', 'Master Barang')
@section('menuBarang', 'active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                Master Barang
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Nama Supplier</th>
                            <th>Pembelian Terakhir</th>
                            <th>Jenis Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->nama_toko }}</td>
                                <td>{{ $item->tgl_pembelian }}</td>
                                <td>{{ $item->jenis_pembayaran }}</td>
                            </tr>
                        @empty
                            <td colspan="7" class="text-center">tidak ada data...</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                {{ $data->links() }}
            </div>
        @endcomponent
    </div>

@endsection
