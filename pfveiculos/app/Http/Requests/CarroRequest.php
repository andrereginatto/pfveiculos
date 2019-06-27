<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
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
            'modelo' => 'required|min:2|max:30',
            'cor' => 'required|min:3',
            'ano' => 'required|numeric|digits:4',
            'ano_modelo' => 'required|numeric|digits:4',
            'marca_id' => 'required',
        ];
    }
}
