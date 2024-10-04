<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparepartRequest extends FormRequest
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
            'kode_barang' => 'required|unique:spareparts',
            'serial_number' => 'unique:spareparts',
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
