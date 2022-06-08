@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">INPUT DATA CUSTOMER</div>
            <div class="card-body">
                <form action="{{ route('simpancust') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="nama">NAMA CUSTOMER</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Customer">
                            </div>
                            <div class="col">
                                <label for="nama">ALAMAT</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nama">EMAIL</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col">
                                <label for="nama">NO. TELP</label>
                                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header text-center">DATA CUSTOMER</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">NO. TELP</th>
                                <th scope="col">MENU</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><b>{{ $item->nama }}</b></td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editcust{{ $item->id }}">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="editcust{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="editPOLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="staticBackdropLabel">
                                                            {{ $item->nama }}
                                                        </h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('updatecust') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <h3>CUSTOMER</h3>
                                                                    </div>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id }}"><br>
                                                                    <div class="form-group">
                                                                        <label>Nama Customer</label>
                                                                        <input type="text" name="nama"
                                                                            class="form-control"
                                                                            value="{{ $item->nama }}" required>
                                                                    </div>
                                                                    <table>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Alamat</label>
                                                                                    <input type="text" name="alamat"
                                                                                        class="form-control"
                                                                                        value="{{ $item->alamat }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input type="text" name="email"
                                                                                        class="form-control"
                                                                                        value="{{ $item->email }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </table>
                                                                    <table>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>No. Telp</label>
                                                                                    <input type="text" name="no_telp"
                                                                                        class="form-control"
                                                                                        value="{{ $item->no_telp }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Gak Jadi</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                       <a href="hapuscust/{{$item->id}}" class="btn btn-danger">hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
