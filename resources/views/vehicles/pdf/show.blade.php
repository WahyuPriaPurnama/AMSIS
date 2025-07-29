<!DOCTYPE html>

<head>
    <title>Biodata Karyawan {{ $vehicle->nama }}</title>
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


        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <h3>{{ $vehicle->subsidiary->name }}</h3>
    <h2>{{ $vehicle->jenis_kendaraan }}</h2>
    <h4>{{ $vehicle->nopol }}</h4>
    <table>
        <tr>
            <th colspan="2">RINGKASAN</th>
            <th colspan="2">KELENGKAPAN</th>
            <th colspan="2">JATUH TEMPO</th>
        </tr>
        <tr>
            @php
                $fields = [
                    'jenis_kendaraan' => 'Kendaraan',
                    'tgl_perolehan' => 'Tanggal Perolehan',
                    'pengguna' => 'Pengguna',
                    'nama_warna' => 'Perusahaan',
                    'warna' => 'Warna',
                    'kode_warna' => 'Kode Warna',
                    'tahun' => 'Tahun Produksi',
                    'atas_nama' => 'Atas Nama',
                    'kondisi' => 'Kondisi',
                ];
            @endphp

            <table>
                @foreach ($fields as $key => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>: {{ $vehicle->$key }}</td>
                    </tr>
                @endforeach
            </table>
            @php
                $fields2 = [
                    'no_rangka' => 'No. Rangka',
                    'no_bpkb' => 'No. BPKB',
                    'no_mesin' => 'No. Mesin',
                    'j_asuransi' => 'Asuransi',
                    'p_asuransi' => 'Polis',
                    'no_polis' => 'No. Polis',
                ];
            @endphp
            <table>
                @foreach ($fields2 as $key => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>: {{ $vehicle->$key }}</td>
                    </tr>
                @endforeach
            </table>
            @php
                $fields3 = [
                    'stnk' => 'STNK',
                    'pajak' => 'Pajak',
                    'kir' => 'KIR',
                ];
            @endphp
            <table>
                @foreach ($fields3 as $key => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>: {{ $vehicle->$key }}</td>
                    </tr>
                @endforeach
            </table>
        </tr>

    </table>
    <table style="width: 50%">
        <tr>
            <th colspan="2">KELENGKAPAN BERKAS</th>
            <th>FOTO</th>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%;">
                    @php
                        $documents = [
                            'foto' => 'Foto',
                            'f_stnk' => 'STNK',
                            'f_pajak' => 'PAJAK',
                            'f_kir' => 'KIR',
                            'qr' => 'QR Code',
                            'f_polis' => 'Polis',
                        ];
                    @endphp

                    @foreach ($documents as $key => $label)
                        <tr>
                            <td style="text-align: left; white-space: nowrap;">{{ $label }}</td>
                            <td style="text-align: left;">: {{ $vehicle->$key ? 'ada' : 'kosong' }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>

            <td style="text-align: center;">
                @if (Storage::exists('public/vehicles/foto/' . $vehicle->foto))
                    <img src="data:image/png;base64,{{ base64_encode(Storage::get('public/vehicles/foto/' . $vehicle->foto)) }}"
                        style="width: 150px; max-width:150px; height: auto;">
                @else
                    <p>Foto tidak ditemukan.</p>
                @endif
            </td>

        </tr>
    </table>

</body>
