@extends('layouts.app')
@section('title', 'Data Kendaraan')
@section('menuVehicle', 'active')
@section('content')
    <div class="container mt-3">
        @if (session()->has('alert'))
            <div class="alert alert-success my-3">
                {{ session()->get('alert') }}
            </div>
        @endif
        @component('components.card')
            @slot('header')
                DATA KENDARAAN
            @endslot
            <div class="text-end">
                <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>JENIS KENDARAAN</th>
                            <th>PLANT</th>
                            <th>PENGGUNA</th>
                            <th>NOPOL</th>
                            <th>STNK</th>
                            <th>PAJAK</th>
                            <th>KIR</th>
                            <th>ASURANSI</th>
                            <th>KONDISI</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis_kendaraan }}</td>
                                <td>{{$item->subsidiary->name}}</td>
                                <td>{{$item->pengguna}}</td>
                                <td>{{$item->nopol}}</td>
                                <td>{{$item->stnk}}</td>
                                <td>{{$item->pajak}}</td>
                                <td>{{$item->kir}}</td>
                                <td>{{$item->jth_tempo}}</td>
                                <td>{{$item->kondisi}}</td>
                                <td>{{$item->keterangan}}</td>
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
