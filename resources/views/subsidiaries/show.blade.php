@extends('layouts.app')
@section('title', "Data $subsidiary->name")
@section('menuSubsidiaries', 'active')
@section('content')
    <div class="container mt-3">
        @if (session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @endif
        @component('components.card')
            @slot('header')
                Data Perusahaan
            @endslot
            <div class="btn-group">
                @can('update', $subsidiary)
                    <a href="{{ route('subsidiaries.edit', ['subsidiary' => $subsidiary->id]) }}" class="btn btn-primary">Edit</a>
                @endcan
                @can('delete', $subsidiary)
                    <form action="{{ route('subsidiaries.destroy', ['subsidiary' => $subsidiary->id]) }}" id="hapus"
                        method="post">
                        @method('DELETE')
                        @csrf
                    </form>
                    <button type="submit" form="hapus" class="btn btn-danger">Hapus</button>
                @endcan
            </div>
            <div class="row mt-5 align-items-center text-center">
                <div class="col-md-3 mx-auto">
                    <img class="img-thumbnail" oncontextmenu="return false"
                        @if ($subsidiary->logo == null) src="
                {{ Storage::url('public/subsidiary/logo/default.png') }}"
               @else
              src="  {{ Storage::url('public/subsidiary/logo/') . $subsidiary->logo }}" @endif
                        alt="" srcset="">
                </div>
                <div class="col-md-7 mt-3 mx-auto">
                    <h3>{{ $subsidiary->name }}</h3>
                    <div>
                        {{ $subsidiary->tagline }}
                    </div>
                    <div>
                        {{ $subsidiary->npwp }}
                    |
                        {{ $subsidiary->email }}
                    |
                        {{ $subsidiary->phone }}
                    </div>
                    <div>
                        {{ $subsidiary->address }}
                    </div>
                </div>
            </div>
            <hr>
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
                                <td><a href="{{ route('employees.show', $employee->id) }}" class="text-decoration-none"
                                        data-bs-toggle="tooltip" data-bs-title="klik untuk lihat detail">
                                        {{ $employee->nama }}
                                    </a></td>
                                <td>{{ $employee->posisi }}</td>
                                <td>{{ $employee->status_peg }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>

@endsection
