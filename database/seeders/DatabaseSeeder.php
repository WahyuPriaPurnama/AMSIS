<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Subsidiary;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Wahyu Pria Purnama',
            'email' => 'wahyupriapurnama@gmail.com',
            'password' => Hash::make('WahyuPria_96')
        ]);

        Employee::create([
            'nip' => '3513170504960001',
            'nama' => 'Wahyu Pria Purnama',
            'nik' => '3513170504960001',
            'perusahaan' => 'AMS Holding',
            'divisi' => 'IT',
            'departemen' => 'IT',
            'seksi' => 'IT',
            'posisi' => 'Manager',
            'status_peg' => 'Tetap',
            'tgl_masuk' => '2021-04-05',

            'tmpt_lahir' => 'Banyuwangi',
            'tgl_lahir' => '1996-04-05',
            'jenis_kelamin' => 'L',
            'alamat' => 'RT 1 RW 5, Gang Pandawa, Desa Sebaung, Dusun Sumber (Belakang Lapangan PG Gending, Rumah No. 10)',
            'no_telp' => '085745334330',
            'email' => 'wahyupriapurnama@gmail.com',
            'pend_trkhr' => 'Sarjana',
            'jurusan' => 'Teknik Komputer',
            'thn_lulus' => '2020',
            'nama_ibu' => 'Tinik Mardiasih',
            'npwp' => '61.314.708.1-625.000',
            'status' => 'Kawin',
            'jml_ank' => '1',
            'nama_kd' => 'Wahyu Sri Ningsih',
            'no_kd' => '085745334330',
            'hubungan' => 'Saudara Sepupu'
        ]);

        Employee::create([
            'nip' => '3513170504960002',
            'nama' => 'Firsandi',
            'nik' => '3513170504960002',
            'perusahaan' => 'AMS Holding',
            'divisi' => 'Desain',
            'departemen' => 'Desain',
            'seksi' => 'Desain Grafis',
            'posisi' => 'Staff',
            'status_peg' => 'Tetap',
            'tgl_masuk' => '2021-04-05',

            'tmpt_lahir' => 'Banyuwangi',
            'tgl_lahir' => '1996-04-05',
            'jenis_kelamin' => 'L',
            'alamat' => 'RT 1 RW 5, Gang Pandawa, Desa Sebaung, Dusun Sumber (Belakang Lapangan PG Gending, Rumah No. 10)',
            'no_telp' => '085745334330',
            'email' => 'wahyupriapurnama@gmail.com',
            'pend_trkhr' => 'Sarjana',
            'jurusan' => 'Teknik Komputer',
            'thn_lulus' => '2020',
            'nama_ibu' => 'Tinik Mardiasih',
            'npwp' => '61.314.708.1-625.000',
            'status' => 'Kawin',
            'jml_ank' => '1',
            'nama_kd' => 'Wahyu Sri Ningsih',
            'no_kd' => '085745334330',
            'hubungan' => 'Saudara Sepupu'
        ]);

        Subsidiary::create([
            'name' => 'CV. Anugerah Mulia Sejahtera',
            'tagline' => 'General Trading and Supplier',
            'npwp' => '70.651.906.3-657.000',
            'email' => 'headoffice@amsgroup.co.id',
            'phone' => '03415054969',
            'address' => 'Perum P. Pratama B2/1P, Karangploso, Malang - East Java 65152, Indonesia'
        ]);
        Subsidiary::create([
            'name' => 'PT. Energy Lautan Nusantara Plant Malang',
            'tagline' => 'Can Maker',
            'npwp' => '94.024.473.4-657.000',
            'email' => 'headoffice@eln.co.id',
            'phone' => '0341 5058269',
            'address' => 'Dusun Boro Nggondang, RT 52 / RW 13, Tawangargo Karangploso, Malang
                            East Java 65152'
        ]);
        Subsidiary::create([
            'name' => 'PT. Energy Lautan Nusantara Plant Banyuwangi',
            'tagline' => 'ABF and Cold Storage',
            'npwp' => '94.024.473.4-657.000',
            'email' => 'headoffice@eln.co.id',
            'phone' => '0333 424150',
            'address' => 'Jalan Bawean No. 7, Klatak, Kalipuro, Banyuwangi
                            East Java 68421'
        ]);
        Subsidiary::create([
            'name' => 'PT. Blue Ocean Foods Indonesia',
            'tagline' => 'Canning',
            'npwp' => '43.623.790.3-625.000',
            'email' => 'headoffice@blueoceanfoods.co.id',
            'phone' => '0333 2815013',
            'address' => ' Dusun Sampangan, Kedungrejo, Muncar, Banyuwangi Regency, East Java'
        ]);
    }
}
