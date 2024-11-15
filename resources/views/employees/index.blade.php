@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container-fluid mt-3">
        @component('components.card')
            @slot('header')
                DATA KARYAWAN
            @endslot
            <div class="row">
                <div class="col">
                    <form action="{{ route('employee.search') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control"
                                @if (Auth::user()->role == 'super-admin' or Auth::user() == 'holding-admin') placeholder="Cari Nama, NIP atau Perusahaan.."
            @else
            placeholder="Cari Nama atau NIP" @endif
                                value="{{ request()->input('search') }}">
                            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></button>
                        </div>
                    </form>
                </div>
                <div class="col text-end">
                    @can('create', App\Models\Employee::class)
                        <a href="{{ route('employees.excel') }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill"
                                viewBox="0 0 16 16">
                                <path d="M6 12v-2h3v2z" />
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3z" />
                            </svg></a>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary" data-bs-toggle="tooltip"
                            data-bs-title="tambah data karyawan"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                            </svg></a>
                    @endcan
                    <a href="{{ route('employees.pdf') }}" class="btn btn-danger" target="_blank" data-bs-toggle="tooltip"
                        data-bs-title="export PDF"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                        </svg></a>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('subsidiary_id', 'PERUSAHAAN')</th>
                            <th>@sortablelink('nip', 'NIP')</th>
                            <th>@sortablelink('nama', 'NAMA')</th>
                            <th>@sortablelink('posisi', 'JABATAN')</th>
                            <th>@sortablelink('seksi', 'SEKSI')</th>
                            <th>@sortablelink('departemen', 'DEPARTEMEN')</th>
                            <th>@sortablelink('status_peg', 'STATUS')</th>
                            <th><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-hourglass-split" viewBox="0 0 16 16">
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
                                    {{ Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) }} hari
                                @else
                                    -
                                @endif
                            </td>
                            </tr>
                        @empty
                            <td colspan="9" class="text-center">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{ $employees->links() }}
            </div>
        @endcomponent
    @endsection
