<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceCriteriaRequest extends FormRequest
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
            'experience' => 'required|string',
            'score' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'experience.required' => 'Pengalaman tidak boleh kosong.',
            'experience.string' => 'Pengalaman harus berupa karakter.',
            'score.required' => 'Nilai tidak boleh kosong.',
            'score.numeric' => 'Nilai harus berupa angka.',
        ];
    }
}
