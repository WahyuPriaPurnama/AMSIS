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
            'whatsapp' => '085745334330',
            'email' => 'wahyupriapurnama@gmail.com',
            'subsidiary' => 'AMS Holding',
            'position' => 'Manager',
            'address' => 'Probolinggo',
        ]);



        Subsidiary::create([
            'name' => 'CV. Anugerah Mulia Sejahtera',
            'tagline' => 'General Trading and Supplier',
            'npwp' => '70.651.906.3-657.000',
            'email' => 'headoffice@amsgroup.co.id',
            'phone' => '03415054969',
            'address' => 'Perum P. Pratama B2/1P, Karangploso, Malang - East Java 65152, Indonesia'
        ]);
    }
}
