@extends('layouts.app')
@section('title', 'Daftar Sparepart')
@section('menuSparepart', 'active')
@section('content')
    <div class="container mt-3">

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
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
        @component('components.card')
            @slot('header')
                DATA SPAREPART
            @endslot
            <div class="text-end">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah
                </button>

            </div>
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>KODE</th>
                            <th>SN</th>
                            <th>NAMA BARANG</th>
                            <th>JUMLAH</th>
                            <th>SATUAN</th>
                            <th>MENU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('spareparts.edit', $item->id) }}" class="text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#showSparepart">
                                        {{ $item->kode_barang }}
                                    </a></td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>
                                    <a href="#" class="btn btn-success">Update</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteSparepart{{ $item->id }}">
                                        Hapus
                                    </button>
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
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Gak
                                                        Jadi</button>
                                                    <button type="submit" form="delete{{$item->id}}" class="btn btn-danger ms-3">Iya,
                                                        Yakin</button>
                                                    <form id="delete{{$item->id}}"
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
