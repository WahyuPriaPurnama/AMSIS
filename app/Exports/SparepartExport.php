<?php

namespace App\Exports;

use App\Models\Sparepart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SparepartExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'id',
            'kode barang',
            'serial number',
            'nama barang',
            'jumlah',
            'satuan',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        return Sparepart::all();
    }
}
