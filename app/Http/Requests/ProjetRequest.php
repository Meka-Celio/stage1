<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
            'projetName' => 'bail|required|max:60'
        ];
    }

    public function messages()
    {
        return [
            'projetName.required'   =>  'Ce champ est requis !'
        ];
    }
}
