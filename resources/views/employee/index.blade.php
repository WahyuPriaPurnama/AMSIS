@extends('layout.master')
@section('title', 'Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container text-center p-3">
<h2>DATA KARYAWAN</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>GENDER</th>
                    <th>PERUSAHAAN</th>
                    <th>JABATAN</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                <td>1.</td>
                <td>3153170504960001</td>
                <td>Wahyu Pria Purnama</td>
                <td>L</td>
                <td>AMS Holding</td>
                <td>IT STAFF</td>
                <td>Probolinggo</td>
            </tbody>
        </table>
    </div>
@endsection
