@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA KARYAWAN</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Data</a>
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
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>PERUSAHAAN</th>
                    <th>JABATAN</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td><a href="{{ route('employees.show', ['employee' => $employee->id]) }}">
                                {{ $employee->nip }}</td>
                        </a>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                        <td>{{ $employee->perusahaan }}</td>
                        <td>{{ $employee->posisi }}</td>
                        <td>{{ $employee->status_peg }}</td>
                    </tr>
                @empty
                    <td colspan="7" class="text-center">Tidak ada data...</td>
                </tbody>
                @endforelse
        </table>
        <br>
      
    </div>
@endsection
