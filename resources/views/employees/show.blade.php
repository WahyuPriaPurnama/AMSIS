@extends('layouts.app')
@section('title', "Biodata $employee->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2><b>BIODATA: </b>{{ $employee->name }} </h2>
            <h2><b>USIA: </b>{{ Carbon\Carbon::parse($employee->dob)->age }} Tahun</h2>
            <div class="d-flex">
                <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                </form>
            </div>
        </div>
        <hr>
        @if (session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
<img class="img-fluid" src="https://images.pexels.com/photos/3785079/pexels-photo-3785079.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
            </div>
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item">NIK: {{ $employee->nik }}</li>
                    <li class="list-group-item">NAMA: {{ $employee->name }}</li>
                    <li class="list-group-item">TGL LAHIR: {{ $employee->dob }}</li>
                    <li class="list-group-item">JENIS KELAMIN:
                        {{ $employee->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}
                    </li>
                    <li class="list-group-item">PERUSAHAAN: {{ $employee->subsidiary }}</li>
                    <li class="list-group-item">JABATAN: {{ $employee->position }}</li>
                    <li class="list-group-item">
                        ALAMAT:
                        {{ $employee->address == '' ? 'N/A' : $employee->address }}
                    </li>
                </ul>
            </div>
        </div>

    </div>
@endsection
