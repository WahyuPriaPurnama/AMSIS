@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div></div>
                    <h3>STOCK</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Stock
                    </button>
                </div>
            </div>


            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">TAMBAH STOCK BARU</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="{{ route('inputstock') }}" enctype="multipart/form-data">
                                @csrf

                                <table>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kode Barang</label>
                                                <input type="text" name="kode" class="form-control"
                                                    placeholder="Kode Barang" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Nama Barang" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" name="jumlah" class="form-control"
                                                    placeholder="masukkan jumlah" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="satuan">Satuan</label>
                                                <input type="text" name="satuan" class="form-control"
                                                    placeholder="satuan stock" required>
                                            </div>
                                        </div>
                                    </div>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
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
                                <th scope="col">MENU</th>

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
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateStock{{ $isi->id }}">
                                            Update
                                        </button>
                                        <div class="modal fade" id="updateStock{{ $isi->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="updateStockLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">UPDATE STOCK
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('gudang_dashboard/updatestock/{id}') }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $isi->id }}">
                                                            <table>                                                         
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Kode Barang</label>
                                                                            <input type="text" name="kode"
                                                                                class="form-control"
                                                                                placeholder="Kode Barang"
                                                                                value="{{ $isi->kode }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Nama Barang</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control"
                                                                                placeholder="Nama Barang"
                                                                                value="{{ $isi->nama }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="jumlah">Jumlah</label>
                                                                            <input type="number" name="jumlah"
                                                                                class="form-control"
                                                                                placeholder="masukkan jumlah"
                                                                                value="{{ $isi->jumlah }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="satuan">Satuan</label>
                                                                            <input type="text" name="satuan"
                                                                                class="form-control"
                                                                                placeholder="satuan stock"
                                                                                value="{{ $isi->satuan }}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                    </form>
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
        </div>
        <br>

        <div class="text-center">
            <div class="card">
                <div class="card-header">
                    <div class="text text-center">
                        <h3>PURCHASE ORDER</h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NAMA CUSTOMER</th>
                                    <th scope="col">NOMOR</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">ITEM</th>
                                    <th scope="col">KUANTITAS</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">PRINT</th>
                                </tr>
                            </thead>

                            <?php $no = 1; ?>
                            <tbody>
                                @foreach ($po as $isi)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ strtoupper($isi->nama_customer) }}</td>
                                        <td>{{ $isi->nomor }}</td>
                                        <td>{{ $isi->tanggal }}</td>
                                        <td>{{ $isi->item }}</td>
                                        <td>{{ $isi->kuantitas }}</td>
                                        <td>
                                            @if ($isi->status === 'OK')
                                                <span class="badge bg-success">OK</span>
                                            @elseif ($isi->status === 'Pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif ($isi->status === 'Batal')
                                                <span class="badge bg-danger">Batal</span>
                                            @else
                                                <span class="badge bg-secondary">Menunggu Konfirmasi</span>
                                            @endif
                                        </td>
                                        <td>{{ $isi->keterangan }}</td>
                                        <td>@if($isi->status ==='OK')
                                           <div class="btn btn-group">
                                               <a href="{{route('input_sj',$isi->id)}}" class="btn btn-outline-primary btn-sm">Surat Jalan</a>
                                               <a href="{{route('input_bon',$isi->id)}}" class="btn btn-outline-danger btn-sm">Bon</a>
                                           </div>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                Halaman: {{ $po->currentPage() }}<br>
                Jumlah Data: {{ $po->total() }}<br>
                Data Per Halaman:{{ $po->perPage() }}<br><br>

                <ul class="pagination justify-content-center">
                    {{ $po->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection
