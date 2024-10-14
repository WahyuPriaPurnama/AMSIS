<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSparepartRequest extends FormRequest
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
        $data = $this->route('sparepart');
        return [
            'kode_barang' => 'required|unique:spareparts,kode_barang,' . $data->id,
            'serial_number' => 'unique:spareparts,serial_number,' . $data->id,
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique' => 'tidak boleh sama',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'kode_barang' => strtoupper($this->kode_barang),
            'serial_number' => strtoupper($this->serial_number),
            'nama_barang' => ucwords(strtolower($this->nama_barang)),
            'satuan' => ucwords(strtolower($this->satuan)),
        ]);
    }
}
