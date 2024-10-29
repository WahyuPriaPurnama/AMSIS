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
                    <form action="{{route('vehicle.search')}}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control"
                                placeholder="cari nama kendaraan atau nama pengguna" id="">
                            <button type="submit" class="btn btn-primary">Cari</button>
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
