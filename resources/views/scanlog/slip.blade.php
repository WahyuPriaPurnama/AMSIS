<head>
    <title>Slip Gaji {{$slips->first()->nama}}</title>
    <style>
        * {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        table{
            border:1px solid black;
            border-collapse: collapse;
            width: 50%;
        }
    </style>
</head>

<body>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/logo/bofi.png'))) }}" alt="Logo" style="width: 100px; height: auto;">
    <br>
    Slip Gaji {{$slips->first()->nama}}<br>
    Periode:<br> {{$start}} s/d {{$end}}<br>

    <br>
    <table>
        <tr>

            <th>TANGGAL</th>
            <th>DURASI KRJ</th>
            <th>UPAH</th>
        </tr>
        @foreach($slips as $slip)
<tr>

    <td>
        {{ \Carbon\Carbon::parse($slip->tgl)->format('d M') }}
    </td>
    <td>
        {{$slip->dk}}
    </td>
    <td>
        {{$slip->tgaji}}
    </td>
    @endforeach
</tr>
    </table>
    <strong>Total Gaji: Rp. {{number_format($totalGaji,0,',','.')}}</strong>

</body>