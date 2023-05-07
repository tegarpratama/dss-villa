<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorCriteriaRequest extends FormRequest
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
            'major' => 'required|string',
            'score' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'major.required' => 'Jurusan tidak boleh kosong.',
            'major.string' => 'Jurusan harus berupa karakter.',
            'score.required' => 'Nilai tidak boleh kosong.',
            'score.numeric' => 'Nilai harus berupa angka.',
        ];
    }
}
