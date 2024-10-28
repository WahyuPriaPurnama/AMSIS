<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return ['NIP', 'NAMA', 'NIK', 'DIVISI', 'DEPARTEMENT', 'SEKSI', 'POSISI', 'STATUS PEGAWAI', 'TANGGAL MASUK', 'AWAL KONTRAK', 'AKHIR KONTRAK', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'L/P', 'ALAMAT', 'NO. TELP', 'EMAIL', 'PENDIDIKAN TERAKHIR', 'JURUSAN', 'TAHUN LULUS', 'NAMA IBU', 'NPWP', 'STATUS PERKAWINAN', 'JUMLAH ANAK', 'NAMA KONTAK DARURAT', 'NOMOR KONTAK DARURAT', 'HUBUNGAN', 'PLANT'];
    }

    public function collection()
    {
        $user = Auth::user()->role;
        $data = Employee::get(['nip', 'nama', 'nik', 'divisi', 'departemen', 'seksi', 'posisi', 'status_peg', 'tgl_masuk', 'awal_kontrak', 'akhir_kontrak', 'tmpt_lahir', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'no_telp', 'email', 'pend_trkhr', 'jurusan', 'thn_lulus', 'nama_ibu', 'npwp', 'status', 'jml_ank', 'nama_kd', 'no_kd', 'hubungan', 'subsidiary_id']);
        if (($user == 'super-admin') or ($user == 'holding-admin')) {
            return $data;
        } elseif ($user == 'eln-admin') {
            return $data->where('subsidiary_id', '2');
        } elseif ($user == 'eln2-admin') {
            return $data->where('subsidiary_id', '3');
        } elseif ($user == 'bofi-admin') {
            return $data->where('subsidiary_id', '4');
        } elseif ($user == 'rmm-admin') {
            return $data->where('subsidiary_id', '6');
        } elseif ($user == 'haka-admin') {
            return $data->where('subsidiary_id', '5');
        }
    }
}
