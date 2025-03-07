<?php

namespace App\Http\Requests\Purchasing;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMasterSupplierRequest extends FormRequest
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
        $supplier = $this->route('master_supplier');
        return [
            'nama_supplier' => 'required|unique:master_suppliers,nama_supplier,' . $supplier->id,
            'jenis_supplier' => 'required',
            'kontak' => 'required',
            'email' => 'email|nullable',
            'up' => 'nullable',
            'alamat' => 'required',
            'pembayaran' => 'required',
            'hari' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique' => 'nama supplier sudah ada'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 'nama_supplier' => ucwords(strtolower($this->nama_supplier)),
            // 'jenis_supplier' => ucwords(strtolower($this->jenis_supplier)),
            'up' => ucwords(strtolower($this->up)),
            'alamat' => ucwords(strtolower($this->alamat))
        ]);
    }
}
