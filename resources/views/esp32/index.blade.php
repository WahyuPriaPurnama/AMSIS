@extends('layouts.app')
@section('title', 'Data Temperatur')
@section('menuEsp32', 'active')
@section('content')
    <div class="container">
        @session('pesan')
            
        @endsession
        <div class="card">
            <div class="card-header">
                DATA SUHU
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sensor</th>
                                <th>Lokasi</th>
                                <th>Suhu</th>
                                <th>Kelembaban</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $d)
                            <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->sensor }}</td>
                                    <td>{{ $d->location }}</td>
                                    <td>{{ $d->value1 }}</td>
                                    <td>{{ $d->value2 }}</td>
                                    <td>{{$d->updated_at}}</td>
                                </tr>
                                    @empty
                                        <td colspan="6" class="text-center">Tidak ada data...</td>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    @endsection
