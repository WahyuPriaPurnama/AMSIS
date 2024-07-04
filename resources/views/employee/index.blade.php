@extends('layout.master')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA KARYAWAN</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Karyawan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('employee.create')
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
                        <td><a href="{{ route('employees.show', ['employee' => $employee->id]) }}">
                                {{ $employee->nik }}</td>
                        </a>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                        <td>{{ $employee->subsidiary }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->address == '' ? 'N/A' : $employee->address }}</td>
                    </tr>
                @empty
                    <td colspan="7" class="text-center">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
