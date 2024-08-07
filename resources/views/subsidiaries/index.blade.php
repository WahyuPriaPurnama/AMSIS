@extends('layouts.app')
@section('title', 'Daftar Perusahaan')
@section('menuSubsidiaries', 'active')
@section('content')

    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA PERUSAHAAN</h2>
            @can('create', App\Models\Subsidiary::class)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                </button>
            @endcan
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Perusahaan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('subsidiaries.create')
                        </div>
                    </div>
                </div>
            </div>
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
                        <th>PERUSAHAAN</th>
                        <th>KARYAWAN</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subsidiaries as $subsidiary)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td><a href="{{ route('subsidiaries.show', ['subsidiary' => $subsidiary->id]) }}"
                                    class="text-decoration-none">
                                    {{ $subsidiary->name }}</td>
                            </a>
                            <td class="text-center">{{ $subsidiary->employees_count }} Orang</td>
                            <td>{{ $subsidiary->address == '' ? 'N/A' : $subsidiary->address }}</td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
