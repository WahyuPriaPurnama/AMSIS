@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA KARYAWAN</h2>
            <form action="{{ route('employee.search') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama"
                        value="{{ old('search') }}">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>
        </div>
        <div class="text-end">
            @can('create', App\Models\Employee::class)
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Data</a>
            @endcan
            <a href="{{ route('employees.pdf') }}" class="btn btn-danger" target="_blank">Export PDF</a>
        </div>
        @if (session()->has('alert'))
            <div class="alert alert-success my-3">
                {{ session()->get('alert') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>@sortablelink('nip', 'NIP')</th>
                        <th>@sortablelink('nama', 'NAMA')</th>
                        <th>@sortablelink('perusahaan', 'PERUSAHAAN')</th>
                        <th>STATUS</th>
                        <th>AKHIR KONTRAK</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        @if (Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) <= 45 and $employee->status_peg == 'PKWT')
                            <tr class="table-danger">
                            @else
                            <tr>
                        @endif
                        <th>{{ $employees->firstItem() + $loop->iteration - 1 }}</th>
                        <td> {{ $employee->nip }}</td>
                        <td><a href="{{ route('employees.show', ['employee' => $employee->id]) }}"
                                class="text-decoration-none">
                                {{ $employee->nama }}
                            </a></td>
                        <td>{{ $employee->subsidiary->name }}</td>
                        <td>{{ $employee->status_peg }}</td>
                        @if ($employee->status_peg == 'PKWT')
                            <td>{{ Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) }} hari</td>
                        @else
                            <td> - </td>
                        @endif
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">Tidak ada data...</td>
                </tbody>
                @endforelse
            </table>
        </div>
        <div class="row">
            {{ $employees->links() }}
        </div>

    </div>
@endsection
