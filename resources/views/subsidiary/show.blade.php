@extends('layout.master')
@section('title', "Data $subsidiary->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2>Biodata {{ $subsidiary->name }}</h2>
            <div class="d-flex">
                <a href="{{ route('subsidiaries.edit', ['subsidiary' => $subsidiary->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('subsidiaries.destroy', ['subsidiary' => $subsidiary->id]) }}" method="post">
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
            <li>NAMA: {{ $subsidiary->name }}</li>
            <li>PERUSAHAAN: {{ $subsidiary->tagline }}</li>
            <li>JABATAN: {{ $subsidiary->npwp }}</li>
            <li>EMAIL: {{ $subsidiary->email }}</li>
            <li>NO. TELP: {{ $subsidiary->phone }}</li>
            <li>ALAMAT: {{ $subsidiary->address }}</li>

        </ul>
    </div>
@endsection
