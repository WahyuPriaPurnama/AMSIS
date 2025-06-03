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
            'jm' => $row[13] ? '' : null,
            'sm' => $row[14] ? '' : null,
            'jp' => $row[24] ? '' : null,
            'sp' => $row[25] ? '' : null,
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
