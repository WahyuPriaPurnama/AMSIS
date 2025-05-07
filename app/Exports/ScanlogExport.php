<?php

namespace App\Exports;

use App\Models\Scanlog;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScanlogExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Scanlog::get(['pin', 'nip', 'nama', 'departement', 'bagian', 'upah', 'tanggal', 'scan_1', 'scan_2', 'scan_3', 'scan_4']);
    }
}
