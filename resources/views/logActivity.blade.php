@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container-fluid text-center">
        <h1>Log Activity Lists</h1>
        <div class="card table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>URL</th>
                    <th>Method</th>
                    <th>Ip</th>
                    <th width="500px">User Agent</th>
                    <th>User Role</th>
                    <th>Waktu</th>
                </tr>
                @if ($logs->count())
                    @foreach ($logs as $key => $log)
                        <tr>
                            <td class="text-success">{{ $log->url }}</td>
                            <td><label class="label label-info">{{ $log->method }}</label></td>
                            <td class="text-warning">{{ $log->ip }}</td>
                            <td class="text-danger">{{ $log->agent }}</td>
                            <td>{{ $log->user_role }}</td>
                            <td>{{$log->created_at}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>


@endsection
