@extends('layouts.app')
@section('title', 'Data Scanlog')
@section('menuScanlog', 'active')
@section('content')
<div class="container-fluid mt-3">
    @component('components.card')
    <div class="button-action mb-3 d-flex flex-wrap gap-1">
        <button type="button" class="btn btn-success w-sm-auto h-100" data-bs-toggle="modal" data-bs-target="#import" data-bs-toggle="tooltip" title="Import Data">
            <i class="bi bi-file-earmark-arrow-down-fill">
            </i>
        </button>
        <a href="{{ route('scanlog.export') }}" class="btn btn-success w-sm-auto h-100" data-bs-toggle="tooltip" title="Export Data">
            <i class="bi bi-file-earmark-arrow-up-fill"></i></a>
        <button type="submit" data-bs-toggle="tooltip" title="Bulatkan Jam" class="btn btn-success w-sm-auto h-100" form="myForm"><i class="bi bi-clock-fill"></i>
        </button>
        <a href="{{ route('scanlog.truncate') }}" class="btn btn-secondary w-sm-auto h-100" data-toggle="tooltip"
            data-placement="top" title="Kosongkan Database">
            <i class="bi bi-trash-fill"></i></a>
        <form action="{{ route('scanlog.convert') }}" id="myForm" method="post">
            @csrf
            <input type="hidden" name="jam" value="60">
        </form>
        <a href="{{route('scanlog.proses.gaji')}}" class="btn btn-primary w-sm-auto h-100">Hitung Gaji</a>
        <div class="alert alert-warning small ms-auto">
            <i class="bi bi-info-circle-fill"></i> Jam Efektif = dipotong istirahat 1 jam atau
            1,5 jam
            (jika >=10 jam)
        </div>
    </div>
    @slot('header')
    Data Scanlog
    @endslot
    <div class="table-responsive">
        <table class="table table-hover display" id="table">
            <thead>
                <tr>
                    <th>PIN</th>
                    <th>NAMA</th>
                    <th>DEPT</th>
                    <th>TANGGAL</th>
                    <th>SHIFT</th>
                    <th>MASUK</th>
                    <th>PULANG</th>
                    <th><i class="bi bi-clock-fill"></i></th>
                    <th>GAJI</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scanlogs as $scanlog)
                <tr>
                    <td>{{ $scanlog->pin }}</td>
                    <td>{{ $scanlog->nama }}</td>
                    <td>{{ $scanlog->dept }}</td>
                    <td>{{ $scanlog->tgl }}</td>
                    <td>
                        @if ($scanlog->jk == 'Tidak Hadir')
                        <span class="badge text-bg-danger">
                            {{ $scanlog->jk }}
                        </span>
                        @else
                        {{ $scanlog->jk }}
                    </td>
                    @endif
                    <td>{{ $scanlog->sm }}</td>
                    <td>{{ $scanlog->sp }}</td>
                    <td>{{ $scanlog->dk }}</td>
                    <td>{{'Rp'.number_format($scanlog->tgaji,2,',','.')}}</td>
                    <td>
                        @if ($scanlog->status == 0)
                        <span class="badge text-bg-danger">
                            Belum Diproses
                        </span>
                        @elseif($scanlog->harian)
                        <span class="badge text-bg-success">
                            berhasil diproses
                        </span>
                        @else
                        <span class="badge text-bg-warning">
                            PIN tidak ditemukan
                        </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endcomponent

        <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">IMPORT DATA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="{{ route('scanlog.import') }}" method="POST" enctype="multipart/form-data">
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

    </div>
</div>
@endsection