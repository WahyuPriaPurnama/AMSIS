@extends('layout.master')
@section('title', "Biodata $employee->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2>Biodata {{ $employee->name }}</h2>
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
        <div class="w-50">
            <ul class="list-group">
                <li class="list-group-item">NIK: {{ $employee->nik }}</li>
                <li class="list-group-item">NAMA: {{ $employee->name }}</li>
                <li class="list-group-item">TGL LAHIR: {{ $employee->dob }}</li>
                <li class="list-group-item">USIA: {{ Carbon\Carbon::parse($employee->dob)->age }} Tahun</li>
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
@endsection
