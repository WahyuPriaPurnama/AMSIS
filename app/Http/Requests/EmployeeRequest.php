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
            'nip' => 'required|size:9|unique:employees',
            'nama' => 'required|min:3|max:50',
            'nik' => 'required|size:16|unique:employees',
            'subsidiary_id' => 'required',
            'divisi' => 'required|max:20',
            'departemen' => 'required|max:20',
            'seksi' => 'required|max:20',
            'posisi' => 'required',
            'status_peg' => 'required',
            'tgl_masuk' => 'required',
            'awal_kontrak' => '',
            'akhir_kontrak' => '',
            'tmpt_lahir' => 'max:20',
            'tgl_lahir' => '',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => '',
            'no_telp' => 'max:15',
            'email' => '',
            'pend_trkhr' => '',
            'jurusan' => 'max:25',
            'thn_lulus' => 'max:4',
            'nama_ibu' => 'max:25',
            'npwp' => 'max:31',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => 'max:50',
            'no_kd' => 'max:15',
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
