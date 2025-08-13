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

        foreach (Employee::all() as $employee) {
            // Buat email dari nama
            $baseEmail = Str::slug($employee->nama, '.');
            $email = "{$baseEmail}@amsgroup.co.id";

            // Cek duplikat email
            $counter = 1;
            while (User::where('email', $email)->exists()) {
                $email = "{$baseEmail}{$counter}@amsgroup.co.id";
                $counter++;
            }


            // Buat user
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
