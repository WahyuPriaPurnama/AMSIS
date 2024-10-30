@extends('layouts.app')
@section('title', 'Data Kendaraan')
@section('menuVehicles', 'active')
@section('content')
    <div class="container-fluid mt-3">
        @component('components.card')
            @slot('header')
                DATA KENDARAAN
            @endslot
            <div class="row">
                <div class="col">
                    <form action="{{ route('vehicle.search') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control"
                                placeholder="cari nama kendaraan atau nama pengguna" id="">
                            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></button>
                        </div>
                    </form>
                </div>
                <div class="col text-end">
                    <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('jenis_kendaraan', 'NAMA KENDARAAN')</th>
                            <th>@sortablelink('kategori', 'KATEGORI')</th>
                            <th>@sortablelink('subsidiary_id', 'PLANT')</th>
                            <th>NOPOL</th>
                            <th>@sortablelink('stnk', 'STNK')</th>
                            <th>@sortablelink('pajak', 'PAJAK')</th>
                            <th>@sortablelink('kir', 'KIR')</th>
                            <th>@sortablelink('jth_tempo', 'ASURANSI')</th>
                            <th>KONDISI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('vehicle.show', ['vehicle' => $item->id]) }}"
                                        class="text-decoration-none">
                                        {{ $item->jenis_kendaraan }}</a></td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->subsidiary->name }}</td>
                                <td>{{ $item->nopol }}</td>
                                <td>{{ $item->stnk }}</td>
                                <td>{{ $item->pajak }}</td>
                                <td>{{ $item->kir }}</td>
                                <td>{{ $item->jth_tempo }}</td>
                                <td>{{ $item->kondisi }}</td>

                            </tr>
                        @empty
                            <td colspan="12" class="text-center">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
