<?php

namespace App\Http\Requests\Purchasing;

use Illuminate\Foundation\Http\FormRequest;

class StoreMasterSupplierRequest extends FormRequest
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
            'nama_supplier' => 'required|unique:master_suppliers',
            'kontak' => '',
            'alamat' => '',
            'pembayaran' => 'required',
            'hari' => ''
        ];
    }

    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique'=>'nama supplier sudah ada'
        ];
    }
}
