<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubsidiaryRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'tagline' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'logo' => 'mimes:png,jpeg,jpg | max:2048'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'wajib diisi',
            'unique' => 'tidak boleh sama',
            'name.max' => 'nama maksimal 50 karakter',
            'name.min' => 'nama minimal 3 karakter',
            'logo.mimes' => 'format yang diizinkan png, jpeg atau jpg',
            'logo.max' => 'maksimal ukuran foto 2 MB'
        ];
    }
}
