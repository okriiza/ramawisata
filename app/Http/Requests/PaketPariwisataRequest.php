<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketPariwisataRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|max:255',
            'tentang_wisata' => 'required',
            'fasilitas' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul Wajib Di Isi.',
            'tentang_wisata.required' => 'Tentang Wisata Wajib Di Isi.',
            'fasilitas.required' => 'Fasilitas Wajib Di Isi.',

        ];
    }
}
