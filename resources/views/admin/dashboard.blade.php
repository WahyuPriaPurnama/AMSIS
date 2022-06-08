@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <h3> STOCK GUDANG</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">KODE</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JUMLAH</th>
                                <th scope="col">SATUAN</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            @foreach ($stock as $isi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $isi->kode }}</td>
                                    <td>{{ $isi->nama }}</td>
                                    <td>{{ $isi->jumlah }}</td>
                                    <td>{{ $isi->satuan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <h3>LIST PURCHASE ORDER</h3>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA CUSTOMER</th>
                                <th>NOMOR</th>
                                <th>TANGGAL</th>
                                <th>ITEM</th>
                                <th>STATUS</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            @foreach ($data as $isi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ strtoupper($isi->nama_customer) }}</td>
                                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#tampilPO{{ $isi->id }}">
                                            {{ $isi->nomor }}
                                        </button>
                                        <div class="modal fade" id="tampilPO{{ $isi->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="tampilPOLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="staticBackdropLabel">
                                                            {{ $isi->nama_customer }}
                                                        </h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <h3> PURCHASE ORDER</h3>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="d-flex justify-content-between">

                                                                        <h4>NOMOR : {{ $isi->nomor }}</h4>

                                                                        <H4> TANGGAL:{{ $isi->tanggal }}</H4>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                </div>
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">ITEM</th>
                                                                            <th scope="col">HARGA</th>
                                                                            <th scope="col">KUANTITAS</th>
                                                                            <th scope="col">TOTAL</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ $isi->item }}</td>
                                                                            <td>{{ $isi->harga }} </td>
                                                                            <td>{{ $isi->kuantitas }}</td>
                                                                            <td>{{ $isi->total }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">

                                                                    <a class="btn btn-danger"
                                                                        href="data_file/{{ $isi->file }}">LAMPIRAN <i
                                                                            class="bi bi-file-earmark"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <td>{{ $isi->tanggal }}</td>
                                    <td>{{ $isi->item }}</td>
                                    <td>
                                        @if ($isi->status === 'OK')
                                            <span class="badge bg-success">OK</span>
                                        @elseif($isi->status === 'Pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($isi->status === 'Batal')
                                            <span class="badge bg-danger">Batal</span>
                                        @elseif($isi->status === 'Waiting')
                                            <span class="badge bg-secondary">Menunggu Konfirmasi</span>
                                        @endif
                                    </td>
                                    <td>{{ $isi->keterangan }}</td>
                                    <td>
                                        <div class="btn btn-group">

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#statusPO{{ $isi->id }}">
                                                status
                                            </button>
                                            <a href="{{ '/data_file/' . $isi->file }}" class="btn btn-danger">File
                                            </a>
                                        </div>
                                        @if ($isi->status === 'OK')
                                            <a href="{{ route('input_inv',$isi->id) }}" class="btn btn-danger">Ctk INV</a>
                                        @endif
                                        <div class="modal fade" id="statusPO{{ $isi->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            <div class="d-flex justify-content-between">
                                                                {{ $isi->nama_customer }}<br>
                                                                {{ $isi->nomor }}
                                                            </div>
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form method="post" action="{{ route('updatestatuspo') }}">

                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $isi->id }}">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select class="form-select" name="status">
                                                                        <option selected>{{ $isi->status }}</option>
                                                                        <option value="OK">OK</option>
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Batal">Batal</option>
                                                                    </select>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <input type="text" name="keterangan"
                                                                        class="form-control" placeholder="keterangan"
                                                                        value="{{ $isi->keterangan }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                Halaman: {{ $data->currentPage() }}<br>
                Jumlah Data: {{ $data->total() }}<br>
                Data Maksimal Per Halaman: {{ $data->perPage() }}<br>
                <Br>
                <ul class="pagination justify-content-center">

                    {{ $data->links() }}

                </ul>
            </div>
        </div>
    </div>
@endsection
