<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Subsidiary;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Employee::create([
            'nik' => '3513170504960001',
            'name' => 'Wahyu Pria Purnama',
            'dob' => '1996-04-05',
            'gender' => 'L',
            'subsidiary' => 'AMS Holding',
            'position' => 'Manager',
            'address' => 'Probolinggo',
        ]);

        Employee::create([
            'nik' => '3513170504960002',
            'name' => 'Lingga Pratama Mulia',
            'dob' => '1996-01-05',
            'gender' => 'L',
            'subsidiary' => 'PT. ELN Plant 1',
            'position' => 'Staff',
            'address' => 'Malang',
        ]);

        Employee::create([
            'nik' => '3513170504960003',
            'name' => 'Firsandi',
            'dob' => '1996-01-20',
            'gender' => 'L',
            'subsidiary' => 'PT. ELN Plant 2',
            'position' => 'Staff',
            'address' => 'Malang',
        ]);

        Subsidiary::create([
            
        ]);
    }
}
