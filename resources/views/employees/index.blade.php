@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">
 

            <!-- <form action="{ route('employee.search') }}" method="get">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Nama"
                                            value="{ old('search') }}">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </form>-->

       
        @if (session()->has('alert'))
            <div class="alert alert-success my-3">
                {{ session()->get('alert') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <b>DATA KARYAWAN</b>
                <div class="text-end">
                    @can('create', App\Models\Employee::class)
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Data</a>
                    @endcan
                    <a href="{{ route('employees.pdf') }}" class="btn btn-danger" target="_blank">Export PDF</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>JABATAN</th>
                                <th>SEKSI</th>
                                <th>STATUS</th>
                                <th><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                    </svg></th>
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

                                <td>{{ $employee->posisi }}</td>
                                <td>{{ $employee->seksi }}</td>
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
        </div>
    </div>
@endsection
