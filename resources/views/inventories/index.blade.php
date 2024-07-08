@extends('layout.master')
@section('title', 'Daftar Inventory')
@section('menuInventories', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA INVENTORY</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Inventory</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('inventories.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session()->has('alert'))
            <div class="alert alert-success">
                {{ session()->get('alert') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>KATEGORI</th>
                    <th>KODE</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH</th>
                    <th>SATUAN</th>
                    <th>DIUPDATE</th>
                    <th>USER</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inventories as $inventory)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $inventory->category }}</td>
                        <td><a href="{{ route('inventories.show', ['inventory' => $inventory->id]) }}">
                            {{ $inventory->code }}</td>
                        </a>
                        <td>{{ $inventory->name }}</td>
                        <td>{{ $inventory->qty }}</td>
                        <td>{{ $inventory->unit }}</td>
                        <td>{{ $inventory->updated_at }}</td>
                        <td>{{ $inventory->user }}</td>
                    </tr>
                @empty
                    <td colspan="8" class="text-center">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
