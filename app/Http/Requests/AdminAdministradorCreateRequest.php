<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdministradorCreateRequest extends FormRequest
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
            //

              'email' => 'required|unique:users|email',

              'name' => 'required|regex:/^[\pL\s\-]+$/u',

        ];
    }
    public function messages(){

        return [
            'email.email' => 'Formato no valido para correo',
            'email.unique' => 'El correo ya existe, por favor eliga otro',
            'name.regex' => 'Formato no valido, solo letras o espacios entre ellas'

                    ];

            }

}
