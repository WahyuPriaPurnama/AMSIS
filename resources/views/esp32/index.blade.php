@extends('layouts.app')
@section('title', 'Data Temperatur')
@section('menuEsp32', 'active')
@section('content')
    <div class="container">
        @session('pesan')
            
        @endsession
        <div class="card shadow">
            <div class="card-header">
                <b>DATA SUHU</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Suhu</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $d)
                            <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->suhu }}</td>
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
