<?php

namespace App\Http\Requests\Purchasing;

use Illuminate\Foundation\Http\FormRequest;

class StoreMasterBarangRequest extends FormRequest
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
            'subsidiary_id' => 'required',
            'nomor_rfo' => 'required',
            'nomor_po' => 'required|unique:master_barangs',
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'master_supplier_id' => 'required',
            'tgl_pembelian' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique' => 'nomor po tidak boleh sama'
        ];
    }
}
