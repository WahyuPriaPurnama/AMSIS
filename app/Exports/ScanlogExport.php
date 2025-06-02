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
            'TANGGAL',
            'JADWAL',
            'JAM KERJA',
            'PIN',
            'NIP',
            'NAMA',
            'DEPARTEMENT',
            'BAGIAN',
            'UPAH',
            'JAM MASUK',
            'SCAN MASUK',
            'JAM PULANG',
            'SCAN PULANG',
            'DURASI KERJA'
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
