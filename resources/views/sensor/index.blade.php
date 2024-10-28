@extends('layouts.app')
@section('title', 'Suhu')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                Suhu
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Suhu</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->suhu }}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>

@endsection
