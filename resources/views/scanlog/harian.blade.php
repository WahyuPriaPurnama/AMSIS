@extends('layouts.app')
@section('title','Karyawan Harian')
@section('menuHarian','active')
@section('content')
<div class="container-fluid mt-3">
    @component('components.card')
    <div class="button-action mb-3 d-flex flex-wrap gap-1">
        <button type="button" class="btn btn-success w-sm-auto h-100" data-bs-toggle="modal" data-bs-target="#import">
            <i class="bi bi-file-earmark-arrow-down-fill">
            </i>
            Import
        </button>
        <a href="{{route('karyawan-harian.export')}}" class="btn btn-success w-sm-auto h-100">
            <i class="bi bi-file-earmark-arrow-up-fill"></i>
            Export</a>
        <a href="{{route('karyawan-harian.truncate')}}" class="btn btn-secondary w-sm-auto h-100" data-toggle="tooltip"
            data-placement="top" title="Kosongkan Database">
            <i class="bi bi-trash-fill"></i></a>
    </div>
    @slot('header')
    Karyawan Harian
    @endslot
    <div class="table-responsive">
        <table class="table table-hover display" id="table">
            <thead>
                <tr>
                    <th>PIN</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>JADWAL</th>
                    <th>DEPARTEMEN</th>
                    <th>BAGIAN</th>
                    <th>NO. TELP</th>
                    <th>GAJI</th>
                    <th>MENU</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($harian as $karyawan)
                <tr>
                    <td>{{ $karyawan->pin }}</td>
                    <td>{{ $karyawan->nip }}</td>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->jadwal_kerja }}</td>
                    <td>{{ $karyawan->departemen }}</td>
                    <td>{{ $karyawan->bagian }}</td>
                    <td>{{ $karyawan->no_telp }}</td>
                    <td>{{$karyawan->gaji}}</td>
                    <td><button type="button" class="btn btn-success w-sm-auto h-100" data-bs-toggle="modal" data-bs-target="#import{{$karyawan->id}}" data-bs-toggle="tooltip" title="Import Data">
                            Cetak Slip
                        </button></td>
                </tr>
                <div class="modal fade" id="import{{$karyawan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cetak Slip {{$karyawan->nama}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="{{route('karyawan-cetak-slip')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label>PILIH TANGGAL</label>
                                    <div class="input-group">
                                        <input type="date" name="start_date" class="form-control">
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                                    <button type="submit" class="btn btn-success">Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endcomponent
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('karyawan-harian.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file"
                            class="form-control @error('file') is-invalid @enderror" required>
                        @error('file')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection