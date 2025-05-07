@extends('layouts.app')
@section('title', 'Data Scanlog')
@section('menuScanlog', 'active')
@section('content')
    <div class="container-fluid mt-3">

        @component('components.card')
            <div class="button-action">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
                    IMPORT
                </button>
                <a href="{{ route('scanlog.export') }}" class="btn btn-primary btn-md">EXPORT</a>
                <a href="{{ route('scanlog.proses') }}" class="btn btn-primary btn-md">Proses</a>
            </div>
            @slot('header')
                Data Scanlog
            @endslot
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th scope="col">PIN</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">DEPARTEMENT</th>
                                <th scope="col">BAGIAN</th>
                                <th scope="col">UPAH</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">SCAN 1</th>
                                <th scope="col">SCAN 2</th>
                                <th scope="col">SCAN 3</th>
                                <th scope="col">SCAN 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scanlog as $scan)
                                <tr>
                                    <td>{{ $scan->pin }}</td>
                                    <td>{{ $scan->nip }}</td>
                                    <td>{{ $scan->nama }}</td>
                                    <td>{{ $scan->departement }}</td>
                                    <td>{{ $scan->bagian }}</td>
                                    <td>{{ $scan->upah }}</td>
                                    <td>{{ date('d-m-Y', strtotime($scan->tanggal)) }}</td>

                                    <td>
                                            {{ $scan->scan_1 }}
                                    </td>

                                    <td>{{ $scan->scan_2 }}</td>
                                    <td>{{ $scan->scan_3 }}</td>
                                    <td>{{ $scan->scan_4 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endcomponent
    </div>
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">IMPORT DATA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scanlog.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>PILIH FILE</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="submit" class="btn btn-success">IMPORT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection
