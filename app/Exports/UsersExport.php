<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
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
}
