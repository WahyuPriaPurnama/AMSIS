@extends('layouts.app')
@section('title', 'Transaksi Selesai')
@section('menuRiwayat', 'active')
@section('content')
    <div class="container-fluid mt-3">

        @component('components.card')
            @slot('header')
                Riwayat Transaksi
            @endslot
            <div class="row">
                <div class="col">
                    <form action="{{ route('master-barang.search') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control"
                                placeholder="cari barang" id="">
                            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('subsidiary_id', 'Nama Plant')</th>
                            <th>Nama Supplier</th>
                            <th>Nomor RFO</th>
                            <th>Nomor PO</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Pembelian</th>
                            <th>Transaksi Selesai</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                                <td>{{ $item->subsidiary->name }}</td>
                                <td>{{ $item->master_supplier->nama_supplier }}</td>
                                <td>{{ $item->nomor_rfo }}</td>
                                <td>{{ $item->nomor_po }}</td>
                                <td> {{ $item->nama_barang }}</td>
                                <td class="text-end">Rp. {{ number_format($item->harga) }},-</td>
                                <td class="text-end">{{ number_format($item->jumlah) }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->tgl_pembelian }}</td>
                                <td>
                                    {{ $item->deleted_at }}
                                </td>
                                <td>
                                    @can('restore', App\Models\Purchasing\MasterBarang::class)
                                        <a href="{{ route('master-barang.restore', $item->id) }}" class="btn btn-success"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-recycle" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z" />
                                            </svg></a>
                                    @endcan
                                    @can('forceDelete', App\Models\Purchasing\MasterBarang::class)
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#forceDeleteBarang{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="forceDeleteBarang{{ $item->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="forceDeleteBarangLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="forceDeleteBarangLabel">Yakin mau hapus
                                                            {{ $item->nama_barang }}?
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Gak
                                                            Jadi</button>
                                                        <button type="submit" form="delete{{ $item->id }}"
                                                            class="btn btn-danger ms-3">Iya,
                                                            Yakin</button>
                                                        <form id="delete{{ $item->id }}"
                                                            action="{{ route('master-barang.forcedestroy', ['master_barang' => $item->id]) }}"
                                                            method="get">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <td colspan="12" class="text-center">tidak ada data...</td>
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
