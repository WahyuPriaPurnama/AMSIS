@extends('layouts.app')
@section('title', "Data $inventory->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2>Detail {{ $inventory->name }}</h2>
            <div class="d-flex">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update">
                    Edit
                </button>
                <form action="{{ route('inventories.destroy', ['inventory' => $inventory->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                </form>
            </div>
        </div>
        <hr>
        @if (session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @endif
        <ul>
            <li>KATEGORI: {{ $inventory->category }} </li>
            <li>KODE BARANG: {{ $inventory->code }}</li>
            <li>NAMA BARANG: {{ $inventory->name }}</li>
            <li>JUMLAH: {{ $inventory->qty }} {{ $inventory->unit }}</li>
            <li>SPESIFIKASI: {{ $inventory->spec }}</li>
        </ul>
        <div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateLabel">Edit Stok</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('inventories.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
