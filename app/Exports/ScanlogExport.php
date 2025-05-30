<?php

namespace App\Exports;

use App\Models\Scanlog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ScanlogExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Scanlog::get(['tgl', 'jadwal', 'jk', 'pin', 'nip', 'nama', 'dept', 'bagian', 'upah', 'jm', 'sm', 'jp', 'sp', 'dk']);
    }

    public function headings(): array
    {
        return [
            'tanggal',
            'jadwal',
            'jam kerja',
            'pin',
            'nip',
            'nama',
            'dept',
            'bagian',
            'upah',
            'jam masuk',
            'scan masuk',
            'jam pulang',
            'scan pulang',
            'durasi kerja'
        ];
    }

    public function styles(Worksheet $sheet){
         // Style untuk baris pertama (header)
        return [
            1 => [ // baris ke-1 (header)
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '1E90FF'] // warna biru
                ],
                'alignment' => ['horizontal' => 'center']
            ],
        ];
    }
}
