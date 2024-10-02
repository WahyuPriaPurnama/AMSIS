@extends('layouts.app')
@section('title', 'Daftar Sparepart')
@section('menuSparepart', 'active')
@section('content')
    <div class="container mt-3">
        @if (session()->has('alert'))
            <div class="alert alert-success my-3">
                {{ session()->get('alert') }}
            </div>
        @endif
        @component('components.card')
            @slot('header')
                DATA SPAREPART
            @endslot
            <div class="text-end">
                @can('create', App\Models\Sparepart::class)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah
                    </button>
                @endcan
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
                                <td>1</td>
                                <td>1111</td>
                                <td>SN12345</td>
                                <td>NAMA BARANG</td>
                                <td>145</td>
                                <td>PCS</td>
                                <td>
                                    <div class="btn btn-group">
                                        <a href="#" class="btn btn-success">Update</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
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
