<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
        $vehicle = $this->route('vehicle');
        return [
            'jenis_kendaraan' => 'required',
            'kategori' => 'required',
            'subsidiary_id' => 'required',
            'tgl_perolehan' => 'required',
            'pengguna' => 'required',
            'nama_warna' => 'required',
            'warna' => 'required',
            'tahun' => 'required',
            'atas_nama' => 'required',
            'nopol' => 'required|unique:vehicles,nopol,' . $vehicle->id,
            'no_rangka' => 'unique:vehicles,no_rangka,' . $vehicle->id,
            'no_bpkb' => 'unique:vehicles,no_bpkb,' . $vehicle->id,
            'no_mesin' => 'unique:vehicles,no_mesin,' . $vehicle->id,
            'stnk' => 'nullable',
            'pajak' => 'nullable',
            'kir' => 'nullable',
            'j_asuransi' => 'nullable',
            'p_asuransi' => 'nullable',
            'no_asuransi' => 'nullable',
            'jth_tempo' => 'nullable',
            'kondisi' => 'required',
            'keterangan' => 'nullable',
            'foto' => 'mimes:png,jpg,jpeg|max:2048',
            'f_stnk' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'f_pajak' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'f_kir' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'qr' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'f_polis' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'kondisi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique' => 'tidak boleh sama',
            'mimes' => 'format yang diijinkan png, jpg, jpeg dan pdf',
            'foto.mimes' => 'format yang diijinkan png, jpg dan jpeg',
            'max' => 'ukuran file maksimum 2 MB'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'jenis_kendaraan' => ucwords(strtolower($this->jenis_kendaraan)),
            'pengguna' => ucwords(strtolower($this->pengguna)),
            'nama_warna' => ucwords(strtolower($this->nama_warna)),
            'nopol' => strtoupper($this->nopol),
            'no_rangka' => strtoupper($this->no_rangka),
            'no_mesin' => strtoupper($this->no_mesin),
            'j_asuransi' => ucwords(strtolower($this->j_asuransi)),
            'no_asuransi' => strtoupper($this->no_asuransi),
            'p_asuransi' => ucwords(strtolower($this->p_asuransi)),
            'kategori' => ucwords(strtolower($this->kategori))
        ]);
    }
}
