<?php

namespace App\Imports;

use App\Models\Scanlog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ScanlogImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquen
     */
    public function model(array $row)
    {

        return new Scanlog([
            'tgl' => date('Y-m-d', strtotime($row[0])),
            'jadwal' => $row[1],
            'jk' => $row[2],
            'pin' => $row[4],
            'nip' => $row[5],
            'nama' => $row[6],
            'dept' => $row[7],
            'bagian' => $row[8],
            'upah' => $row[9] === '' ? null : $row[9],
            'jm' => $row[13] === '' ? null : $row[13],
            'sm' => $row[14] === '' ? null : $row[14],
            'jp' => $row[24] === '' ? null : $row[24],
            'sp' => $row[25] === '' ? null : $row[25],
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
