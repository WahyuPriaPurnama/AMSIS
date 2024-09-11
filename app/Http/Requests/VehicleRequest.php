<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'jenis_kendaraan' =>'required',
            'subsidiary_id'=>'required',
            'tgl_perolehan'=>'required',
            'pengguna'=>'required',
            'warna'=>'required',
            'tahun'=>'required',
            'atas_nama'=>'required',
            'nopol'=>'required|unique:vehicles',
            'kondisi'=>'required'
        ];
    }
}
