<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptanceCriteriaRequest extends FormRequest
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
            'score' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'score.required' => 'Nilai tidak boleh kosong.',
            'score.numeric' => 'Nilai harus berupa angka.',
        ];
    }
}
