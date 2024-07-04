@extends('layout.master')
@section('title', 'Daftar Perusahaan')
@section('menuSubsidiary', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA PERUSAHAAN</h2>
            <a href="{{ route('subsidiaries.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        <th>NAMA</th>
                        <th>TAGLINE</th>
                        <th>NPWP</th>
                        <th>EMAIL</th>
                        <th>NO. TELP</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subsidiaries as $subsidiary)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td><a href="{{ route('subsidiaries.show', ['subsidiary' => $subsidiary->id]) }}">
                                    {{ $subsidiary->name }}</td>
                            </a>
                            <td>{{ $subsidiary->tagline }}</td>
                            <td>{{ $subsidiary->npwp }}</td>
                            <td>{{ $subsidiary->email }}</td>
                            <td>{{ $subsidiary->phone }}</td>
                            <td>{{ $subsidiary->address == '' ? 'N/A' : $subsidiary->address }}</td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>
        </div>


@endsection
