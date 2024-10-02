<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'nip' => 'required|unique:employees|string',
            'nama' => 'required|string',
            'nik' => 'required|unique:employees|integer',
            'subsidiary_id' => 'required|integer',
            'divisi' => 'required|alpha',
            'departemen' => 'required',
            'seksi' => 'required',
            'posisi' => 'required',
            'status_peg' => 'required',
            'tgl_masuk' => 'required|date',
            'awal_kontrak' => '',
            'akhir_kontrak' => '',
            'tmpt_lahir' => 'required|alpha',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'string',
            'no_telp' => 'required',
            'email' => 'email',
            'pend_trkhr' => 'required|alpha',
            'jurusan' => 'alpha',
            'thn_lulus' => 'integer',
            'nama_ibu' => 'string',
            'npwp' => '',
            'status' => 'required',
            'jml_ank' => 'integer',
            'nama_kd' => 'alpha',
            'no_kd' => 'integer',
            'hubungan' => 'alpha',
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
            'integer' => 'hanya boleh berisi angka',
            'alpha_num' => 'hanya boleh berisi huruf dan angka',
            'email' => 'harus berisi email valid',
            'date' => 'harus berisi tanggal yang valid',
            'string' => 'hanya boleh berisi teks'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nama' => ucwords(strtolower($this->nama)),
            'divisi' => ucwords(strtolower($this->divisi)),
            'departemen' => ucwords(strtolower($this->departemen)),
            'seksi' => ucwords(strtolower($this->seksi)),
            'tmpt_lahir' => ucwords(strtolower($this->tmpt_lahir)),
            'jurusan' => ucwords(strtolower($this->jurusan)),
            'nama_ibu' => ucwords(strtolower($this->nama_ibu)),
            'nama_kd' => ucwords(strtolower($this->nama_kd)),
            'hubungan' => ucwords(strtolower($this->hubungan))
        ]);
    }
}
