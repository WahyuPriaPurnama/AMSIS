@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
        @slot('header')
                LOG ACTIVITY
            @endslot
            
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>URL</th>
                                <th>Method</th>
                                <th>IP</th>
                                <th width="500px">Agent</th>
                                <th>Level</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($logs as $key => $log)
                                    <tr>
                                        <td class="text-success">{{ $log->url }}</td>
                                        <td><label class="label label-info">{{ $log->method }}</label></td>
                                        <td class="text-warning">{{ $log->ip }}</td>
                                        <td class="text-danger">{{ $log->agent }}</td>
                                        <td>{{ $log->user_role }}</td>
                                        <td>{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            @endcomponent
        </div>
    </div>


@endsection
