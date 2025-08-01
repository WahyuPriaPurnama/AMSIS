@extends('layouts.app')
@section('title', 'Daftar Perusahaan')
@section('menuSubsidiaries', 'active')
@section('content')
    <div class="container mt-3">
        <!-- Modal -->
        @component('components.card')
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
            <div class="button-action mb-3">
                @can('create', App\Models\Subsidiary::class)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Tambah Data">
                        <i class="bi bi-file-earmark-plus-fill"></i>
                    </button>
                @endcan
            </div>
            @slot('header')
                DATA PERUSAHAAN
            @endslot
            <div class="table-responsive">
                <table class="table table-hover display" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>KARYAWAN</th>
                            <th>ALAMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subsidiaries as $subsidiary)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    @if (Auth::user()->role == 'super-admin' or Auth::user()->role == 'holding-admin')
                                        <a href="{{ route('subsidiaries.show', $subsidiary->id) }}"
                                            class="text-decoration-none">
                                            {{ $subsidiary->name }}
                                        </a>
                                    @else
                                        {{ $subsidiary->name }}
                                    @endif
                                </td>
                                <td class="text-center">{{ $subsidiary->employees_count }} Orang</td>
                                <td>{{ $subsidiary->address == '' ? 'N/A' : $subsidiary->address }}</td>
                            </tr>
                        @empty
                            <td colspan="7" class="text-center">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>KARYAWAN</th>
                            <th>ALAMAT</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
