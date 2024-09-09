@extends('layouts.app')
@section('title', "Data $subsidiary->name")
@section('content')
    <div class="container">
        @if (session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <b>{{ $subsidiary->name }}</b>
                <div class="d-flex">
                    @can('update', $subsidiary)
                        <a href="{{ route('subsidiaries.edit', ['subsidiary' => $subsidiary->id]) }}"
                            class="btn btn-primary">Edit</a>
                    @endcan
                    @can('delete', $subsidiary)
                        <form action="{{ route('subsidiaries.destroy', ['subsidiary' => $subsidiary->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                        </form>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>{{ $subsidiary->tagline }}</li>
                    <li>{{ $subsidiary->npwp }}</li>
                    <li>{{ $subsidiary->email }}</li>
                    <li>{{ $subsidiary->phone }}</li>
                    <li>{{ $subsidiary->address }}</li>
                    
                    
                </ul>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA KARYAWAN</th>
                                <th>POSISI</th>
                                <th>STATUS PEGAWAI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsidiary->employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->nama }}</td>
                                    <td>{{ $employee->posisi }}</td>
                                    <td>{{ $employee->status_peg }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
