@extends('layouts.app')
@section('title', 'Master Barang')
@section('menuBarang', 'active')
@section('content')
    <div class="container-fluid mt-3">
        {{-- modal tambah data --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('purchasing.master_barang.create')
                    </div>
                </div>
            </div>
        </div>
        @component('components.card')
            <div class="button-action mb-3">
                @can('create', App\Models\Purchasing\MasterBarang::class)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        id="tooltip" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="Tambah Data">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                        </svg>
                    </button>
                @endcan
            </div>
            @slot('header')
                Master Barang
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Plant</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Last Order</th>
                            <th>Next Order</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            @if (
                                $item->kategori == 'Periodik' &&
                                    Carbon\Carbon::now()->diffInDays(Carbon\Carbon::parse($item->tgl_pembelian)->addDay($item->periode)) <= 7)
                                <tr class="table-danger">
                                @else
                                <tr>
                            @endif
                            <td>{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                            <td>{{ $item->subsidiary->name }}</td>
                            <td>{{ $item->master_supplier->nama_supplier }}</td>
                            <td><a href="{{ route('master-barang.edit', $item->id) }}" class="text-decoration-none"
                                    data-bs-toggle="modal" data-bs-target="#editBarang{{ $item->id }}">
                                    {{ $item->nama_barang }}
                                </a>
                                <div class="modal fade" id="editBarang{{ $item->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Barang
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @include('purchasing.master_barang.edit')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->kategori }}</td>
                            <td>Rp. {{ number_format($item->harga) }},-</td>
                            <td>{{ number_format($item->jumlah) }} {{ $item->satuan }}</td>
                            <td>{{ $item->tgl_pembelian }}</td>
                            <td>
                                @if ($item->kategori == 'Periodik')
                                    {{ Carbon\Carbon::parse($item->tgl_pembelian)->addDay($item->periode)->toDateString() }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>

                                @can('delete', App\Models\Purchasing\MasterBarang::class)
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteBarang{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </button>
                                    <div class="modal fade" id="deleteBarang{{ $item->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteBarangLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteBarangLabel">Hapus
                                                        {{ $item->nama_barang }}?
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" form="delete{{ $item->id }}"
                                                        class="btn btn-success ms-3">Iya</button>
                                                    <form id="delete{{ $item->id }}"
                                                        action="{{ route('master-barang.destroy', ['master_barang' => $item->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
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
        @endcomponent
    </div>
@endsection
