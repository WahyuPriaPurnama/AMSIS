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
            'nip' => 'required|unique:employees',
            'nama' => 'required',
            'nik' => 'required|unique:employees',
            'subsidiary_id' => 'required',
            'divisi' => 'required',
            'departemen' => 'required',
            'seksi' => 'required',
            'posisi' => 'required',
            'status_peg' => 'required',
            'tgl_masuk' => 'required',
            'awal_kontrak' => '',
            'akhir_kontrak' => '',
            'tmpt_lahir' => '',
            'tgl_lahir' => '',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => '',
            'no_telp' => '',
            'email' => '',
            'pend_trkhr' => '',
            'jurusan' => '',
            'thn_lulus' => '',
            'nama_ibu' => '',
            'npwp' => '',
            'status' => '',
            'jml_ank' => '',
            'nama_kd' => '',
            'no_kd' => '',
            'hubungan' => '',
            'pp' => 'mimes:png,jpg,jpeg|max:2048',
            'ktp' => 'mimes:pdf|max:2048',
            'kk' => 'mimes:pdf|max:2048',
            'npwp2' => 'mimes:pdf|max:2048',
            'bpjs_kes' => 'mimes:pdf|max:2048',
            'bpjs_ket' => 'mimes:pdf|max:2048',
        ];
    }
    
    public function messages()
    {
        return [
            '*.required' => 'wajib diisi',
            '*.unique' => 'tidak boleh sama'
        ];
    }
}
