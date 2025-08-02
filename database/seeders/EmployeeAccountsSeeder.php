<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Employee;

class EmployeeAccountsSeeder extends Seeder
{
    public function run()
    {
        User::where('role', 'employee')->delete();

        $employees = Employee::all();

        foreach ($employees as $employee) {
            $email = Str::slug($employee->nama, '.') . '@amsgroup.co.id';

            if (User::where('email', $email)->exists()) {
                continue;
            }

            User::create([
                'name' => $employee->nama,
                'email' => $email,
                'password' => Hash::make('Karyawan_2025'),
                'role' => 'employee',
                'employee_id' => $employee->id,
                'subsidiary_id' => $employee->subsidiary_id,
            ]);
        }
    }
}