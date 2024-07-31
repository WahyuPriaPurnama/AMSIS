@extends('layouts.app')
@section('title', "Data $subsidiary->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2>Detail {{ $subsidiary->name }}</h2>
            <div class="d-flex">
                @can('update', $subsidiary)
                    <a href="{{ route('subsidiaries.edit', ['subsidiary' => $subsidiary->id]) }}" class="btn btn-primary">Edit</a>
                @endcan
                @can('delete', $subsidiary)
                    <form action="{{ route('subsidiaries.destroy', ['subsidiary' => $subsidiary->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                    </form>
                @endcan
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
            <li>NPWP: {{ $subsidiary->npwp }}</li>
            <li>EMAIL: {{ $subsidiary->email }}</li>
            <li>NO. TELP: {{ $subsidiary->phone }}</li>
            <li>ALAMAT: {{ $subsidiary->address }}</li>
        </ul>

        <div class="table table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA KARYAWAN</th>
                        <th>POSISI</th>
                        <th>STATUS PEGAWAI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsidiary->employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td>{{ $employee->posisi }}</td>
                            <td>{{ $employee->status_peg }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
