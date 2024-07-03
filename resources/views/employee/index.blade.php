@extends('layout.master')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container text-center mt-3">
        <h2>DATA KARYAWAN</h2>
        @if (session()->has('alert'))
            <div class="alert alert-success">
                {{ session()->get('alert') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>PERUSAHAAN</th>
                    <th>JABATAN</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td><a href="{{route('employees.show',['employee'=>$employee->id])}}">
                                {{ $employee->nik }}</td>
                        </a>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                        <td>{{ $employee->subsidiary }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->address == '' ? 'N/A' : $employee->address }}</td>
                    </tr>
                @empty
                    <td colspan="7">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
