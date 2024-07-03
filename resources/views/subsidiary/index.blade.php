@extends('layout.master')
@section('title', 'Data Perusahaan')
@section('menuSubsidiary', 'active')
@section('content')
    <div class="container text-center p-3">

<h3>DAFTAR PERUSAHAAN</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA PERUSAHAAN</th>
                    <th>JUMLAH KARYAWAN</th>
                    <th>TELEPON</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                <td>1.</td>
                <td>PT. ENERGY LAUTAN NUSANTARA</td>
                <td>50</td>
                <td>0341 5058269</td>
                <td>Karangploso, Malang</td>
            </tbody>
        </table>
    </div>
@endsection
