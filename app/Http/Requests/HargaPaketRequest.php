<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HargaPaketRequest extends FormRequest
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
            'price_title.*' => 'required',
            'seat_59.*' => 'required',
            'seat_47.*' => 'required',
            'seat_30.*' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'price_title.*.required' => 'Hari / Tempat / Keterangan Wajib Di Isi.',
            'seat_59.*.required' => 'Harga Seat 59 Wajib Di Isi.',
            'seat_47.*.required' => 'Harga Seat 47 Wajib Di Isi.',
            'seat_30.*.required' => 'Harga Seat 30 Wajib Di Isi.',
        ];
    }
}
