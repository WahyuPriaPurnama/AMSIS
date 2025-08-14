@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container-fluid mt-3">
        @component('components.card')
            <div class="button-action mb-3 d-flex gap-2 flex-wrap justify-content-between flex-wrap">
                @can('create', App\Models\Employee::class)
                    <div class="d-flex gap-2 flex-wrap">
                        <x-buttons.create href="{{ route('employees.create') }}"></x-buttons.create>
                        <x-buttons.excel href="{{ route('employees.excel') }}"></x-buttons.excel>
                    </div>
                @endcan
                <x-buttons.pdf href="{{ route('employees.pdf') }}"></x-buttons.pdf>
            </div>
            @slot('header')
                DATA KARYAWAN
            @endslot
            <div class="table-responsive">
                <table class="table table-hover display" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PERUSAHAAN</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>SEKSI</th>
                            <th>DEPARTEMEN</th>
                            <th>STATUS</th>
                            <th>SISA KONTRAK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <th>{{ $employees->firstItem() + $loop->iteration - 1 }}</th>
                                <td>{{ $employee->subsidiary->name }}</td>
                                <td> {{ $employee->nip }}</td>
                                <td><a href="{{ route('employees.show', $employee->id) }}" class="text-decoration-none"
                                        data-bs-toggle="tooltip" data-bs-title="klik untuk lihat detail">
                                        {{ $employee->nama }}
                                    </a></td>
                                <td>{{ $employee->posisi }}</td>
                                <td>{{ $employee->seksi }}</td>
                                <td>{{ $employee->departemen }}</td>
                                <td>{{ $employee->status_peg }}</td>
                                <td>
                                    @if ($employee->status_peg == 'PKWT')
                                        @php
                                            $days = \Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak, false);
                                        @endphp

                                        @if ($days < 0)
                                            <span class="text-danger">sudah berakhir</span>
                                        @else
                                            <span class="text-success">{{ $days }} hari</span>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td colspan="9" class="text-center">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PERUSAHAAN</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>JABATAN</th>
                                <th>SEKSI</th>
                                <th>DEPARTEMEN</th>
                                <th>STATUS</th>
                                <th><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                    </svg></th>
                            </tr>
                        </thead>
                    </tfoot>
                </table>
            </div>
        @endcomponent

    @endsection
