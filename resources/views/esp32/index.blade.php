@extends('layouts.app')
@section('title', 'Data Temperatur')
@section('menuSuhu', 'active')
@section('content')
    <div class="container mt-3">
        @if (session()->has('alert'))
            <div class="alert alert-success my-3">
                {{ session()->get('alert') }}
            </div>
        @endif
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
                                    <td>{{ $d->updated_at }}</td>
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
