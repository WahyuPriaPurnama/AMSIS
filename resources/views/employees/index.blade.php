@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">


        <form action="{{ route('employee.search') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control"
                    @if (Auth::user()->role == 'super-admin' or Auth::user() == 'holding-admin') placeholder="Cari Nama, NIP atau Perusahaan.."
                @else
                placeholder="Cari Nama atau NIP" @endif
                    value="{{ old('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>


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
                        <a href="{{ route('employees.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-title="tambah data karyawan" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                          </svg></a>
                    @endcan
                    <a href="{{ route('employees.pdf') }}" class="btn btn-danger" target="_blank" data-bs-toggle="tooltip" data-bs-title="export PDF"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                        <path d="M5.523 10.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                        <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.6 11.6 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                      </svg></a>
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
                                {{-- PERUSAHAAN --}}
                                <th>JABATAN</th>
                                <th>SEKSI</th>
                                <th>DEPARTEMEN</th>
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
                                        class="text-decoration-none" data-bs-toggle="tooltip" data-bs-title="klik untuk lihat detail">
                                        {{ $employee->nama }}
                                    </a></td>
                               {{-- $employee->subsidiary->name--}}
                                <td>{{ $employee->posisi }}</td>
                                <td>{{ $employee->seksi }}</td>
                                <td>{{ $employee->departemen }}</td>
                                <td>{{ $employee->status_peg }}</td>
                                @if ($employee->status_peg == 'PKWT')
                                    <td>{{ Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) }} hari</td>
                                @else
                                    <td> - </td>
                                @endif
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
            </div>
        </div>
    </div>
@endsection
