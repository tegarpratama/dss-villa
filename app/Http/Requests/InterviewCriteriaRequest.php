<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewCriteriaRequest extends FormRequest
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
            'min_param' => 'required|numeric',
            'max_param' => 'required|numeric',
            'score' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'min_param.required' => 'Nilai terkecil tidak boleh kosong.',
            'min_param.numeric' => 'Nilai terkecil harus berupa angka.',
            'max_param.required' => 'Nilai terbesar tidak boleh kosong.',
            'max_param.numeric' => 'Nilai terbesar harus berupa angka.',
            'score.required' => 'Nilai tidak boleh kosong.',
            'score.numeric' => 'Nilai harus berupa angka.',
        ];
    }
}
