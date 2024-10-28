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
                    <a href="{{route('spareparts.export')}}" class="btn btn-success">Export Excel</a>
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
                                <td>{{ $loop->iteration }}</td>
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
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    {{-- update qty --}}
                                    @can('update', App\Models\Sparepart::class)
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#updateSparepart{{ $item->id }}">
                                            Update
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
                                            Hapus
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
        @endcomponent
    </div>
@endsection
