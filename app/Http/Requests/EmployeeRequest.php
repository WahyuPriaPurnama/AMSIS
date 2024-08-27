<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nip' => 'size:9|unique:employees',
            'nama' => 'min:3|max:50',
            'nik' => 'size:16|unique:employees',
            'subsidiary_id' => '',
            'divisi' => 'max:20',
            'departemen' => 'max:20',
            'seksi' => 'max:20',
            'posisi' => '',
            'status_peg' => '',
            'tgl_masuk' => '',
            'awal_kontrak' => '',
            'akhir_kontrak' => '',
            'tmpt_lahir' => 'max:20',
            'tgl_lahir' => '',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => '',
            'no_telp' => '',
            'email' => '',
            'pend_trkhr' => '',
            'jurusan' => 'max:25',
            'thn_lulus' => 'max:4',
            'nama_ibu' => 'max:25',
            'npwp' => 'max:31',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => 'max:50',
            'no_kd' => 'max:12',
            'hubungan' => 'max:15',
            'pp' => 'mimes:png,jpg,jpeg|max:2048',
            'ktp' => 'mimes:pdf|max:2048',
            'kk' => 'mimes:pdf|max:2048',
            'npwp2' => 'mimes:pdf|max:2048',
            'bpjs_kes' => 'mimes:pdf|max:2048',
            'bpjs_ket' => 'mimes:pdf|max:2048',
        ];
    }
}
