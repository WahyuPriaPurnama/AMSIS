<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithMapping, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private int $rowNumber = 0;
    public function collection()
    {
        return User::with('employee.subsidiary')->get();
    }

    public function map($employee): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $employee->name,
            $employee->email,
            $employee->subsidiary->name ?? 'Tidak diketahui',
        ];
    }

    public function headings(): array
    {
        return ['No', 'Nama', 'Username', 'Plant'];
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
