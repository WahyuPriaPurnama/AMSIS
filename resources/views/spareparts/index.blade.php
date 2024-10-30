@extends('layouts.app')
@section('title', 'Daftar Sparepart')
@section('menuSparepart', 'active')
@section('content')
    <div class="container-fluid mt-3">
        {{-- modal tambah data --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Sparepart</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('spareparts.create')
                    </div>
                </div>
            </div>
        </div>

        {{-- modal edit data --}}


        @component('components.card')
            @slot('header')
                DATA SPAREPART
            @endslot
            <div class="row">
                <div class="col">
                    <form action="{{ route('sparepart.search') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control"
                                placeholder="cari nama sparepart" id="">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="col text-end">
                    <a href="{{ route('spareparts.export') }}" class="btn btn-success">Export Excel</a>
                    @can('create', App\Models\Sparepart::class)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah
                        </button>
                    @endcan
                </div>
            </div>
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>KODE</th>
                            <th>NAMA BARANG</th>
                            <th>SPESIFIKASI</th>
                            <th>JUMLAH</th>
                            <th>SATUAN</th>
                            <th>DIPERBARUI</th>
                            <th>MENU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                                <td>
                                    @can('update', App\Models\Sparepart::class)
                                        <a href="{{ route('spareparts.edit', $item->id) }}" class="text-decoration-none"
                                            data-bs-toggle="modal" data-bs-target="#editSparepart{{ $item->id }}">
                                        @endcan
                                        {{ $item->kode_barang }}
                                    </a>

                                    <div class="modal fade" id="editSparepart{{ $item->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data
                                                        {{ $item->nama_barang }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('spareparts.edit')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    {{-- update qty --}}
                                    @can('update', App\Models\Sparepart::class)
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#updateSparepart{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                                                <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708M4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1m5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12"/>
                                              </svg>
                                        </button>
                                    @endcan
                                    <div class="modal fade" id="updateSparepart{{ $item->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Jumlah
                                                        {{ $item->nama_barang }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('spareparts.update')
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- hapus data --}}
                                    @can('delete', App\Models\Sparepart::class)
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteSparepart{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                            </svg>
                                        </button>
                                    @endcan
                                    <div class="modal fade" id="deleteSparepart{{ $item->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteSparepartLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteSparepartLabel">Yakin mau hapus
                                                        {{ $item->nama_barang }}?
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-dismiss="modal">Gak
                                                        Jadi</button>
                                                    <button type="submit" form="delete{{ $item->id }}"
                                                        class="btn btn-danger ms-3">Iya,
                                                        Yakin</button>
                                                    <form id="delete{{ $item->id }}"
                                                        action="{{ route('spareparts.destroy', ['sparepart' => $item->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="7" class="text-center">Tidak ada data...</td>
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
