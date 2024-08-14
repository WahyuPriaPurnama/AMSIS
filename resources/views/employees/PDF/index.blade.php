<head>
    <title>Data Karyawan</title>
    <style>
        table,
        th,
        td,
        {
        border: 1px solid black;
        font-size: 80%;
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
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>PERUSAHAAN</th>
            <th>STATUS</th>
            <th>HARI</th>
        </tr>

        {{ $i = 1 }}
        @forelse ($employees as $employee)
            @if (Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) <= 45 && $employee->status_peg == 'PKWT')
                <tr id="warning">
                @else
                <tr>
            @endif
            <td>{{ $i++ }}</td>
            <td> {{ $employee->nip }}</td>
            <td> {{ $employee->nama }}</td>

            <td>{{ $employee->subsidiary->name }}</td>
            <td>{{ $employee->status_peg }}</td>
            @if ($employee->status_peg == 'PKWT')
                <td>{{ Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) }}</td>
            @else
                <td> - </td>
            @endif
            </tr>
        @empty
            <td colspan="6" class="text-center">Tidak ada data...</td>
            </tbody>
        @endforelse
    </table>
</body>
