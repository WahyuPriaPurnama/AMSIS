<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>SURAT JALAN</title>

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
            background-color: rgb(0, 4, 255);
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

        .row2#bon {
            margin-right: 12%;
            margin-bottom: 15%;
        }

    </style>
</head>

<body>
    <div class="surat-jalan">
        <div class="row">
            <div class="column1">
                <img src="" alt="">
                <b>{{ $dari_sj }}</b><br>
                <div style="font-size: 12px"><b>General Trading & Supplier</b></div>
                <div style="font-size: 10px"> <b>Headoffice:</b>Perum P. Pratama B1/21, Karangploso - Malang<br>
                    <b>Email:</b>headoffice@amsgroup.co.id
                </div>
            </div>
            <div class="column2">
                <div style="font-size: 12px"> Kepada:</div>
                {{ $kepada_sj }}
            </div>
        </div>
        <div class="judul"> <b>SURAT JALAN PENGIRIMAN BARANG</b><br>
            {{ $nomor_sj }}
        </div>
        <table>
            <tr style="font-size:12px;color:white">
                <th style="width: 1px;">NO.</th>
                <th>NAMA BARANG</th>
                <th>URAIAN</th>
                <th>JUMLAH</th>
                <th>SATUAN</th>
                <th>NO. BPB</th>
                <th>KETERANGAN</th>
            </tr>
            <tr style="text-align: center">
                <td >{{ $no_sj }}</td>
                <td>{{ $nama_barang_sj }}</td>
                <td>{{ $uraian_sj }}</td>
                <td>{{ $jml_sj }}</td>
                <td>{{ $satuan_sj }}</td>
                <td>{{ $no_bpb_sj }}</td>
                <td>{{ $keterangan_sj }}</td>
            </tr>
        </table>
        <br>
        <div style="text-align: right;padding-right:20%;padding-bottom:5%;">{{ $kota_sj }},{{ $tanggal_sj }}
        </div>
        <div class="row2">
            <div class="column">Mengetahui<br><br><br></div>
            <div class="column">Penerima<br><br><br></div>
            <div class="column">Pembawa<br><br><br></div>
            <div class="column">Pengirim<br><br><br></div>
        </div>
        <div style="text-align: center;font-size:15px;margin-top:5%;background-color:rgb(4, 0, 255);color:white;">
            www.ams.amsgroup.co.id</div>
    </div>
</body>

</html>
