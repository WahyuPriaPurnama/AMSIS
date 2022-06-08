<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>BON PENGIRIMAN BARANG</title>

    <style>
        table,
        th,
        td {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
        }

        table th {
            background-color: rgb(25, 0, 247);
        }

        table td {
            height: 150px;
            vertical-align: top;
        }

        .column1 {
            float: left;
            width: 65%;
            padding: 10px;

        }

        .column2 {
            float: right;
            width: 35%;
            padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .column {
            float: left;
            width: 25%;
            text-align: center;
        }

        .row2:after {
            content: "";
            display: table;
            clear: both;
        }

        .judul {
            text-align: center;
            margin-bottom: 2%;
        }

        .column#bon {
            width: 35%;
            padding: 10px;
            float: left;
        }

        .row2#bon {
            margin-right: 12%;
            margin-bottom: 15%;
        }

    </style>
</head>

<body>
    <div class="bon-pengiriman-barang">
        <div class="row">
            <div class="column1">
                <b> {{ $dari }}</b><br>
                <div style="font-size: 12px"><b>General Trading & Supplier</b></div>
                <div style="font-size: 10px"> <b>Headoffice:</b>Perum P. Pratama B1/21 Karangploso - Malang<br>
                    <b>Email:</b>headoffice@amsgroup.co.id
                </div>
            </div>
            <div class="column2">
                <div style="font-size: 12px"> Kepada:</div>
                <b>{{ $kepada }}</b>
                <div style="font-size: 13px">Nomor Truck:<b>{{$no_plat}}</b> Berat:<b>{{$berat}}</b><br>
                    Perusahaan Angkutan:{{$perusahaan_angkutan}}</div>
 
            </div>
        </div>
        <div class="judul"> <b>BON PENGIRIMAN BARANG</b>
            <br> {{ $nomor_bon }}
        </div>
        <table>
            <tr style="font-size: 10px;color:white">
                <th>MACAM BARANG</th>
                <th>NOMOR</th>
                <th>BANYAKNYA</th>
                <th>SATUAN</th>
                <th>KETERANGAN</th>
            </tr>
            <tr style="text-align: center;">
                <td>{{ $nama_barang }}</td>
                <td>{{ $nomor }}</td>
                <td>{{ $banyaknya }}</td>
                <td>{{ $satuan }}</td>
                <td>{{ $keterangan }}</td>
            </tr>
        </table>
        <br>
        <div style="text-align: right;padding-right:10%;padding-bottom:5%;">{{ $kota }}, {{ $tanggal }}
        </div>
        <div class="row2" id="bon">
            <div class="column" id="bon">Tanda Terima / Cap<br>Nama Lengkap<br><br><br><br><br>Customer</div>
            <div class="column" id="bon">Mengetahui,<br>Pem. Perusahaan/Cap<br><br><br><br><br>Manager</div>
            <div class="column" id="bon">Tanda Tangan<br><br><br><br><br><br>Admin</div>
        </div>
        <div style="text-align: center;font-size:15px;margin-top:5%;background-color:rgb(0, 4, 255);color:white;">
            www.ams.amsgroup.co.id</div>
    </div>
</body>
</html>
