@extends('layouts.app')
@section('title', 'Daftar Perusahaan')
@section('menuSubsidiaries', 'active')
@section('content')
    <div class="container mt-3">
        <!-- Modal -->
        @component('components.card')
            <div class="button-action mb-3">
                @can('create', App\Models\Subsidiary::class)
                    <x-buttons.create href="{{ route('subsidiaries.create') }}"></x-buttons.create>
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
                                        <a href="{{ route('subsidiaries.show', $subsidiary->id) }}" class="text-decoration-none">
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
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada karyawan terdaftar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
