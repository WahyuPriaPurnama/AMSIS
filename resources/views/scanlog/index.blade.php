@extends('layouts.app')
@section('title', 'Data Scanlog')
@section('menuScanlog', 'active')
@section('content')
    <div class="container-fluid mt-3">
        @component('components.card')
            <div class="button-action mb-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#import">
                    <i class="bi bi-file-earmark-arrow-down-fill">
                    </i>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                </button>
                <a href="{{ route('scanlog.export') }}" class="btn btn-success btn-md"><i
                        class="bi bi-file-earmark-arrow-up-fill"></i>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i></a>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ctime">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button type="submit" class="btn btn-success btn-md" form="myForm"><i class="bi bi-clock-fill"></i> Convert</button>
                <a href="{{ route('scanlog.truncate') }}" class="btn btn-secondary btn-md" data-toggle="tooltip"
                    data-placement="top" title="Kosongkan Database">
                    <i class="bi bi-trash-fill"></i></a>
                <form action="{{ route('scanlog.convert') }}" id="myForm" method="post">
                    @csrf
                    <input type="hidden" name="jam" value="60">
                </form>
            </div>
            @slot('header')
                Data Scanlog
            @endslot
            <div class="table-responsive">
                <table class="table table-hover display" id="table">
                    <thead>
                        <tr>
                            <th>TANGGAL</th>
                            <th>JADWAL</th>
                            <th>SHIFT</th>
                            <th>PIN</th>
                            <th>NAMA</th>
                            <th>DEPARTEMEN</th>
                            <th>JAM MASUK</th>
                            <th>SCAN MASUK</th>
                            <th>JAM PULANG</th>
                            <th>SCAN PULANG</th>
                            <th>DURASI KERJA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scanlog as $scan)
                            <tr>
                                <td>{{$scan->tgl}}</td>
                                <td>{{ $scan->jadwal }}</td>
                                <td>{{ $scan->jk }}</td>
                                <td>{{ $scan->pin }}</td>
                                <td>{{ $scan->nama }}</td>
                                <td>{{ $scan->dept }}</td>
                                <td>{{ $scan->jm }}</td>
                                <td>{{ $scan->sm }}</td>
                                <td>{{ $scan->jp }}</td>
                                <td>{{ $scan->sp }}</td>
                                <td>{{ $scan->dk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
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
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                required>
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
    <div class="modal fade" id="ctime" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Range Jam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ route('scanlog.ctime') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="">Range Bawah</label>
                                <input type="time" name="awal" id="" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Range Atas</label>
                                <input type="time" name="akhir" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Menjadi</label>
                                <input type="time" name="waktu" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                        <button type="submit" class="btn btn-success">PROSES</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
