@extends('layout.master')
@section('title', "Data $inventory->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2>Detail {{ $inventory->name }}</h2>
            <div class="d-flex">
                <a href="{{ route('inventories.edit', ['inventory' => $inventory->id]) }}" class="btn btn-primary">Edit</a>
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
            <li>SPESIFIKASI {{ $inventory->spec }}</li>
            <li>JUMLAH: {{ $inventory->qty }} {{ $inventory->unit }}</li>
        </ul>
    </div>
@endsection
