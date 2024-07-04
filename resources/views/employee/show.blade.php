@extends('layout.master')
@section('title', "Biodata $employee->name")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2>Biodata {{ $employee->name }}</h2>
            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary">Edit</a>
        </div>
        <hr>
        @if (session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @endif
        <ul>
            <li>NIK: {{ $employee->nik }}</li>
            <li>NAMA: {{ $employee->name }}</li>
            <li>JENIS KELAMIN:
                {{ $employee->gender == 'P' ? 'Perempuan' : 'Laki-aki' }}
            </li>
            <li>PERUSAHAAN: {{ $employee->subsidiary }}</li>
            <li>JABATAN:{{$employee->position}}</li>
            <li>
                ALAMAT:
                {{ $employee->address == '' ? 'N/A' : $employee->address }}
            </li>

        </ul>
    </div>
@endsection
