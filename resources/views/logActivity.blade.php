@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <b>LOG ACTIVITY</b>
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>


@endsection
