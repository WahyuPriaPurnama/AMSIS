<?php

namespace App\Exports;

use App\Models\Harian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HarianExport implements FromCollection, WithStyles, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Harian::get(['pin', 'nip', 'nama', 'jadwal_kerja', 'departemen', 'bagian', 'no_telp', 'gaji']);
    }

    public function headings(): array
    {
        return [
            'PIN',
            'NIP',
            'NAMA',
            'JADWAL',
            'DEPARTEMEN',
            'BAGIAN',
            'TELP',
            'GAJI'
        ];
    }

    public function styles(Worksheet $sheet)
    {

        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '3100ba']
                ],
                'alignment' => ['horizontal' => 'center']
            ],
        ];
    }
}
