<?php

namespace App\Imports;

use App\Models\Scanlog;
use Maatwebsite\Excel\Concerns\ToModel;

class ScanlogImport implements ToModel
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
            'jm' => $row[13],
            'sm' => $row[14],
            'jp' => $row[24],
            'sp' => $row[25],
            'dk' => $row[27],
        ]);
    }
}
