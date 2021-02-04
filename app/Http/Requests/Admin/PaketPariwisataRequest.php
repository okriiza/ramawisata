<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaketPariwisataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul' => 'required|max:255',
            'tentang_wisata' => 'required',
            'fasilitas' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'judul.required' => 'Judul Wajib Di Isi.',
            'tentang_wisata.required' => 'Tentang Wisata Wajib Di Isi.',
            'fasilitas.required' => 'Fasilitas Wajib Di Isi.',

        ];
    }

}
