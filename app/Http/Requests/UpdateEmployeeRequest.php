<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        $employee = $this->route('employee');
        return [
            'nip' => 'required|unique:employees,nip,' . $employee->id,
            'nama' => 'required',
            'nik' => 'required|unique:employees,nik,' . $employee->id,
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
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
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
            'ktp' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'kk' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'npwp2' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'bpjs_kes' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'bpjs_ket' => 'mimes:png,jpg,jpeg,pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique' => 'tidak boleh sama',
            'pp.mimes' => 'format yang diizinkan png, jpg dan jpeg',
            'mimes' => 'format yang diizinkan png, jpg, jpeg dan pdf',
            'max' => 'ukuran file maksimum 2 MB',
            'email' => 'format email tidak valid',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nama' => ucwords(strtolower($this->nama)),
            'tmpt_lahir' => ucwords(strtolower($this->tmpt_lahir)),
            'jurusan' => ucwords(strtolower($this->jurusan)),
            'nama_ibu' => ucwords(strtolower($this->nama_ibu)),
            'nama_kd' => ucwords(strtolower($this->nama_kd)),
            'hubungan' => ucwords(strtolower($this->hubungan)),
            'email' => strtolower($this->email),
        ]);
    }
}
