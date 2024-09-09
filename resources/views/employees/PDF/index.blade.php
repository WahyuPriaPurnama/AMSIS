<head>
    <title>Data Karyawan AMS Holding</title>
    <style>
        table,
        th,
        td,
        {
        border: 1px solid black;
        font-size: 50%;
        border-collapse: collapse;
        }

        * {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        table {
            width: 100%;
        }

        a {
            text-decoration: black;
        }

        #warning {
            background-color: yellow;
        }
    </style>
</head>

<body>

    <h2>DATA KARYAWAN</h2>

    <table>
        <tr>
            <th colspan="11">ORGANISASI</th>
            <th colspan="13">BIODATA</th>
            <th colspan="3">KONTAK DARURAT</th>
        </tr>
        <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>PERUSAHAAN</th>
            <th>DIVISI</th>
            <th>DEPARTEMEN</th>
            <th>SEKSI</th>
            <th>JABATAN</th>
            <th>STATUS</th>
            <th>-</th>
            <th>TMPT LHR</th>
            <th>TGL LHR</th>
            <th>USIA</th>
            <th>L/P</th>
            <th>ALAMAT</th>
            <th>NO. TELP</th>
            <th>EMAIL</th>
            <th>PENDIDIKAN</th>
            <th>JURUSAN</th>
            <th>THN LULUS</th>
            <th>NAMA IBU</th>
            <th>NPWP</th>
            <th>STATUS</th>
            <th>ANAK</th>
            <th>NAMA</th>
            <th>NO. TELP</th>
            <th>HUBUNGAN</th>
        </tr>

        {{ $i = 1 }}
        @forelse ($employees as $employee)
            @if (Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) <= 45 && $employee->status_peg == 'PKWT')
                <tr id="warning">
                @else
                <tr>
            @endif
            <td>{{ $i++ }}</td>
            <td>{{ $employee->nip }}</td>
            <td>{{ $employee->nama }}</td>
            <td>{{ $employee->nik }}</td>
            <td>{{ $employee->subsidiary->name }}</td>
            <td>{{ $employee->divisi }}</td>
            <td>{{ $employee->departemen }}</td>
            <td>{{ $employee->seksi }}</td>
            <td>{{ $employee->posisi }}</td>
            <td>{{ $employee->status_peg }}</td>
            @if ($employee->status_peg == 'PKWT')
                <td>{{ Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) }}</td>
            @else
                <td> - </td>
            @endif
            <td>{{ $employee->tmpt_lahir }}</td>
            <td>{{ $employee->tgl_lahir }}</td>
            <td>{{ Carbon\Carbon::parse($employee->tgl_lahir)->age }}</td>
            <td>{{ $employee->jenis_kelamin }}</td>
            <td>{{ $employee->alamat }}</td>
            <td>{{ $employee->no_telp }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->pend_trkhr }}</td>
            <td>{{ $employee->jurusan }}</td>
            <td>{{ $employee->thn_lulus }}</td>
            <td>{{ $employee->nama_ibu }}</td>
            <td>{{ $employee->npwp }}</td>
            <td>{{ $employee->status }}</td>
            <td>{{ $employee->jml_ank }}</td>
            <td>{{ $employee->nama_kd }}</td>
            <td>{{ $employee->no_kd }}</td>
            <td>{{ $employee->hubungan }}</td>
            </tr>
        @empty
            <td colspan="6" class="text-center">Tidak ada data...</td>
            </tbody>
        @endforelse
    </table>
</body>
