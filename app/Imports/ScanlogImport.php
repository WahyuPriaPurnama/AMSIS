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
     * @return \Illuminate\Database\Eloquent\Model|null
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
            'upah' => $row[9],
            'jm' => $row[13] ?: '00:00:00',
            'sm' => $row[14] ?: '00:00:00',
            'jp' => $row[24] ?: '00:00:00',
            'sp' => $row[25] ?: '00:00:00',
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
