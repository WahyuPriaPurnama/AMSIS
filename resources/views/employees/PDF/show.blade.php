<!DOCTYPE html>

<head>
    <title>Biodata Karyawan {{ $employee->nama }}</title>
    <style>
        * {

            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        table,
        tr,
        th,
        td {

            border-collapse: collapse;
            vertical-align: top;
            padding: 1%;
            font-size: 90%;
        }

        #keterangan {
            width: 25%;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <h3>{{ $employee->subsidiary->name }}</h3>
    <h4>{{ $employee->nama }}</h4>
    <table>
        <tr>
            <th colspan="2">ORGANISASI</th>
            <th colspan="2">BIODATA</th>
            <th colspan="2">KONTAK DARURAT</th>
        </tr>
        <tr>
            <td>
                NIP<br>
                Nama<br>
                NIK<br>
                Divisi<br>
                Departemen<br>
                Seksi<br>
                Posisi<br>
                Tanggal Masuk<br>
                Status
            </td>
            <td>
                : {{ $employee->nip }}<br>
                : {{ $employee->nama }}<br>
                : {{ $employee->nik }}<br>
                : {{ $employee->divisi }}<br>
                : {{ $employee->departemen }}<br>
                : {{ $employee->seksi }}<br>
                : {{ $employee->posisi }}<br>
                : {{ $employee->tgl_masuk }}<br>
                : {{ $employee->status_peg }}<br>
                @if ($employee->status_peg == 'PKWT')
                    : {{ $employee->awal_kontrak }}<br>
                    : {{ $employee->akhir_kontrak }}
                @endif
            </td>
            <td>
                Tempat Lahir<br>
                Tanggal Lahir<br>
                Jenis Kelamin<br>
                Alamat<br>
                No. Telp<br>
                Email<br>
                Pendidikan Terakhir<br>
                Jurusan<br>
                Tahun Lulus<br>
                Nama Ibu<br>
                NPWP<br>
                Status Pernikahan<br>
                Jumlah Anak
            </td>
            <td>
                : {{ $employee->tmpt_lahir }}<br>
                : {{ Carbon\Carbon::create($employee->tgl_lahir)->isoFormat('dddd, D MMMM YYYY') }}<br>
                : {{ $employee->jenis_kelamin }}<br>
                : {{ $employee->alamat }}<br>
                : {{ $employee->no_telp }}<br>
                : {{ $employee->email }}<br>
                : {{ $employee->pend_trkhr }}<br>
                : {{ $employee->jurusan }}<br>
                : {{ $employee->thn_lulus }}<br>
                : {{ $employee->nama_ibu }}<br>
                : {{ $employee->npwp }}<br>
                : {{ $employee->status }}<br>
                : {{ $employee->jml_ank }}<br>
            </td>
            <td>
                Nama<br>
                No. Telp<br>
                Hubungan<br>
            </td>
            <td>
                : {{ $employee->nama_kd }}<br>
                : {{ $employee->no_kd }}<br>
                : {{ $employee->hubungan }}<br>
            </td>
        </tr>
    </table>
    <table id="keterangan">
        <tr>
            <th colspan="2">KELENGKAPAN BERKAS</th>
        </tr>
        <tr>
            <td>
                Foto Profil<br>
                KTP<br>
                NPWP<br>
                Kartu Keluarga<br>
                BPJS Ketenagakerjaan<br>
                BPJS Kesehatan
            </td>
            <td>
                @if ($employee->pp != null)
                    : ada<br>
                @else
                    : kosong<br>
                @endif
                @if ($employee->ktp != null)
                    : ada<br>
                @else
                    : kosong<br>
                @endif
                @if ($employee->npwp2 != null)
                    : ada<br>
                @else
                    : kosong<br>
                @endif
                @if ($employee->kk != null)
                    : ada<br>
                @else
                    : kosong<br>
                @endif
                @if ($employee->bpjs_ket != null)
                    : ada<br>
                @else
                    : kosong<br>
                @endif
                @if ($employee->bpjs_kes != null)
                    : ada<br>
                @else
                    : kosong<br>
                @endif
            </td>
        </tr>
    </table>

</body>
