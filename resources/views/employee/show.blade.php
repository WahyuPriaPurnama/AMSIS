@extends('layout.master')
@section('title', "Biodata $employee->name")
@section('content')
    <div class="container mt-3">
        <h2>Biodata {{ $employee->name }}</h2>
        <hr>
        <ul>
            <li>NIK: {{ $employee->nik }}</li>
            <li>NAMA: {{ $employee->name }}</li>
            <li>JENIS KELAMIN:
                {{ $employee->gender == 'P' ? 'Perempuan' : 'Laki-aki' }}
            </li>
            <li>PERUSAHAAN: {{ $employee->subsidiary }}</li>
            <li>
                ALAMAT:
                {{ $employee->address == '' ? 'N/A' : $employee->address }}
            </li>

        </ul>
    </div>
@endsection
