<?php

namespace App\Exports;

use App\Models\Scanlog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ScanlogExport implements FromCollection, WithHeadings, WithStyles, WithMapping, WithColumnFormatting
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
            'JAM KERJA',
            'PIN',
            'NIP',
            'NAMA',
            'DEPARTEMENT',
            'BAGIAN',
            'UPAH',
            'TANGGAL',
            'JADWAL',
            'JAM MASUK',
            'SCAN MASUK',
            'JAM PULANG',
            'SCAN PULANG',
            'DURASI KERJA'
        ];
    }

    public function map($row): array
    {
        return [
            $row->jk,
            $row->pin,
            $row->nip,
            $row->nama,
            $row->dept,
            $row->bagian,
            $row->upah,
            $row->tgl,
            $row->jadwal,
            $row->jm,
            $row->sm,
            $row->jp,
            $row->sp,
            $row->dk
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

    public function columnFormats(): array
    {
        return [
            'K' => NumberFormat::FORMAT_DATE_TIME2,
            'M' => NumberFormat::FORMAT_DATE_TIME3
        ];
    }
}
