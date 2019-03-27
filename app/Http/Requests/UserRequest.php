<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'  => 'bail|required|regex:/^[A-Z a-z]+$/',
            'email' =>  'required|email',
            'password'  =>  'required|min:6', 
        ];
    }

    public function messages()
    {
        return [
            'name.required'      =>  'Ce champ est requit !',
            'email.required'      =>  'Ce champ est requit !',
            'password.required'      =>  'Ce champ est requit !',
            'email'         =>  'Ce champ ne respect pas le format e-mail !',
            'name.regex'    =>  'Des lettres uniquement !',
            'min'           =>  'Il faut au moin 6 caractères pour le mot de passe'
        ];
    }
}
