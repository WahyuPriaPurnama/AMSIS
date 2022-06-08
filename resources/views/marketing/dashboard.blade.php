@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div class="card">
            <div class="card-header">
                <div class="text text-center">
                    <h3>STATISTIK</h3>
                </div>
            </div>
            <div class="card-header">
                <div class="card-body">
                    <canvas id="myChart" style="width:100%;max-height:500px"></canvas>
                </div>
            </div>
        </div>
        <br>
        <div class="card">

            <div class="card-header">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <div></div>
                    <h3>PURCHASE ORDER LIST</h3>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputPO">
                        Input PO
                    </button>
                </div>
            </div>
            <div class="modal fade" id="inputPO" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">INPUT PO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('inputpo') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <select name="nama_customer" id="" class="form-select">
                                        @foreach ($customer as $item)
                                        <option value="{{$item->nama_customer}}">{{$item->nama_customer}}</option>
                                        @endforeach
                                       
                                    </select>
                                   
                                </div>
                                <table>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nomor</label>
                                                <input type="text" name="nomor" class="form-control"
                                                    placeholder="nomor PO" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="tanggal" required>
                                            </div>
                                        </div>
                                    </div>
                                </table>
                                <table>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Item</label>
                                                <input type="text" name="item" class="form-control" placeholder="item"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>harga</label>
                                                <input type="number" id="hargainput" name="harga" onblur="suminput()" class="form-control" placeholder="harga"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>kuantitas</label>
                                                <input type="number" id="kuantitasinput" onblur="suminput()" name="kuantitas" class="form-control"
                                                    placeholder="kuantitas" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="number" id="totalinput" name="total" class="form-control" placeholder="total"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </table>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Lampiran</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                        <script>
                            function suminput(){
                                var harga=parseInt(document.getElementById("hargainput").value);
                                var kuantitas=parseInt(document.getElementById("kuantitasinput").value);
                                document.getElementById("totalinput").value=harga*kuantitas;
                            }
                        </script>
                    </div>
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
                                <th scope="col">STATUS</th>
                                <th scope="col">KETERANGAN</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            @foreach ($po as $isi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $isi->nama_customer }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
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
                                                                            class="bi bi-file-earmark"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                </div>
                </td>
                <td>{{ $isi->tanggal }}</td>
                <td>{{ $isi->item }}</td>

                <td>
                    @if ($isi->status === 'OK')
                        <span class="badge bg-success">OK</span>
                    @elseif ($isi->status === 'Pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif ($isi->status === 'Batal')
                        <span class="badge bg-danger">Batal</span>
                    @elseif ($isi->status === 'Waiting')
                        <span class="badge bg-secondary">Menunggu Konfirmasi</span>
                    @endif
                </td>
                <td>{{ $isi->keterangan }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-danger" href="{{ '/data_file/' . $isi->file }}">
                            File
                        </a>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editPO{{ $isi->id }}">
                            Edit
                        </button>
                    </div>
                    <div class="modal fade" id="editPO{{ $isi->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPOLabel" aria-hidden="true">
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
                                    <form method="post" action="{{ route('updatepo') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <h3>PURCHASE ORDER</h3>
                                                </div>

                                                <input type="hidden" name="id" value="{{ $isi->id }}"><br>
                                                <div class="form-group">
                                                    <label>Nama Customer</label>
                                                    <input type="text" name="nama_customer" class="form-control"
                                                        placeholder="nama Customer" value="{{ $isi->nama_customer }}"
                                                        required>
                                                </div>
                                                <table>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Nomor</label>
                                                                <input type="text" name="nomor" class="form-control"
                                                                    placeholder="nomor PO" value="{{ $isi->nomor }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tanggal" class="form-control"
                                                                    placeholder="tanggal" value="{{ $isi->tanggal }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </table>
                                                <table>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Item</label>
                                                                <input type="text" name="item" class="form-control"
                                                                    placeholder="item" value="{{ $isi->item }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>harga</label>
                                                                <input type="number" name="harga" class="form-control"
                                                                    placeholder="harga" value="{{ $isi->harga }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>kuantitas</label>
                                                                <input type="number" name="kuantitas"
                                                                    class="form-control" placeholder="kuantitas"
                                                                    value="{{ $isi->kuantitas }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Total</label>
                                                                <input type="number" name="total" class="form-control"
                                                                    placeholder="total" value="{{ $isi->total }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </table>

                                                <br>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Lampiran</label>
                                                        <input type="file" name="file" class="form-control"
                                                            value="{{ $isi->file }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Gak Jadi</button>
                                    <button type="submit" class="btn btn-success">Update</button>
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
        <div class="text-center">
            Halaman: {{ $po->currentPage() }}<br>
            Jumlah Data: {{ $po->total() }}<br>
            Data Maksimal Per Halaman: {{ $po->perPage() }}<br>

            <br>
            <ul class="pagination justify-content-center">

                {{ $po->links() }}

            </ul>
        </div>
    </div>
    </div>





    <script>
        
        const labels = [
            'JANUARY',
            'FEBRUARY',
            'MARET',
            'APRIL',
            'MEI',
            'JUNI',
            'JULI',
            'AGUSTUS',
            'SEPTEMBER',
            'OKTOBER',
            'NOVEMBER',
            'DESEMBER'
        ];


        const data = {
            labels: labels,
            datasets: [{
                label: 'OK',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 1,
                data: [{{ $ok }}],
            }, {
                label: 'PENDING',
                backgroundColor: 'rgba(255, 159, 64, 0.5)',
                borderColor: 'rgb(255, 159, 64)',
                borderWidth: 1,
                data: [{{ $pending }}]
            }, {
                label: 'BATAL',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1,
                data: [{{ $batal }}]
            }, {
                label: 'MENUNGGU KONFIRMASI',
                backgroundColor: 'rgba(201, 203, 207, 0.5)',
                borderColor: 'rgb(201, 203, 207)',
                borderWidth: 1,
                data: [{{ $waiting }}]
            }],
        };
        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    </script>

    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
        var xValues = ["OK", "Pending", "Batal", "Waiting"];
        var yValues = [{{ $ok }}, {{ $pending }}, {{ $batal }}, {{ $waiting }}];
        var barColors = ["green", "orange", "red", "Gray"];

        new Chart("bar", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {

                title: {
                    display: true,
                    text: "STATUS PO"
                }

            }
        });
    </script>
@endsection
