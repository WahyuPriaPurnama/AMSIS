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
                            <th>Nama Plant</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Nama Supplier</th>
                            <th>Pembelian</th>
                            <th>Jatuh Tempo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                                <td>{{ $item->subsidiary->name }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td class="text-end">Rp. {{ number_format($item->harga) }},-</td>
                                <td class="text-end">{{ number_format($item->jumlah) }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->master_supplier->nama_supplier }}</td>
                                <td>{{ $item->tgl_pembelian }}</td>
                                <td>
                                    @if ($item->master_supplier->pembayaran == 'Tempo')
                                        {{ Carbon\Carbon::parse($item->tgl_pembelian)->addDay($item->master_supplier->hari)->toDateString() }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td colspan="9" class="text-center">tidak ada data...</td>
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
