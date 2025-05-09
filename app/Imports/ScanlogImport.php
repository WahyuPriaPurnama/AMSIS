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
        if ($row == '') {
            $row = null;
        }
        return new Scanlog([
            'pin' => $row[0],
            'nip' => $row[1],
            'nama' => $row[2],
            'departement' => $row[3],
            'bagian' => $row[4],
            'upah' => $row[5],
            'tanggal' => date('Y-m-d', strtotime($row[6])),
            'scan_1' => $row[7],
            'scan_2' => $row[8],
            'scan_3' => $row[9],
            'scan_4' => $row[10],
        ]);
    }
}
