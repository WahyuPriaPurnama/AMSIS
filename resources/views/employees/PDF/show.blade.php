<!DOCTYPE html>

<head>
    <title>Biodata {{ $employee->nama }}</title>
    <style>
        * {

            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            vertical-align: top;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <h3>{{ $employee->subsidiary->name }}</h3>
    <table>
        <tr>
            <th>ORGANISASI</th>
            <th>BIODATA</th>
            <th>KONTAK DARURAT</th>
        </tr>
        <tr>
            <td>
                {{ $employee->nip }}<br>
                {{ $employee->nama }}<br>
                {{ $employee->nik }}<br>
                {{ $employee->divisi }}<br>
                {{ $employee->departemen }}<br>
                {{ $employee->seksi }}<br>
                {{ $employee->posisi }}<br>
                {{ $employee->tgl_masuk }}<br>
                {{ $employee->status_peg }}<br>
                @if ($employee->status_peg == 'PKWT')
                    {{ $employee->awal_kontrak }}<br>
                    {{ $employee->akhir_kontrak }}
                @endif
            </td>
            <td>
                {{ $employee->tmpt_lahir }}<br>
                {{ $employee->tgl_lahir }}<br>
                {{ $employee->jenis_kelamin }}<br>
                {{ $employee->alamat }}<br>
                {{ $employee->no_telp }}<br>
                {{ $employee->email }}<br>
                {{ $employee->pend_trkhr }}<br>
                {{ $employee->jurusan }}<br>
                {{ $employee->thn_lulus }}<br>
                {{ $employee->nama_ibu }}<br>
                {{ $employee->npwp }}<br>
                {{ $employee->status }}<br>
                {{ $employee->jml_ank }}<br>
            </td>
            <td>
                {{ $employee->nama_kd }}<br>
                {{ $employee->no_kd }}<br>
                {{ $employee->hubungan }}<br>
            </td>
        </tr>

    </table>
</body>
