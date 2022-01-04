<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdministradorEditRequest extends FormRequest
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

            //
            $administradores = $this->route('administradores'); //nombre de la ruta del controlador UsuarioAdministradoresController aunque ahi se llama administradores.index
            return [
                //

                /* 'email' => 'required|unique:users,email,'.$this->user.',id', */
                /* 'email' => 'unique:users,email,'.$this->users, */
                /* 'email' => 'unique:users,email,'.$this->users.',email', */
                'email' => 'required|unique:users,email,'.$this->usuario.',id',
                 'role_as' => 'required',
                 'name' => 'required|required|regex:/^[a-zA-Z0-9,.!? ]*$/',
            ];

    }
    public function messages(){

        return [
            'email.unique' => 'Este correo ya existe, por favor eliga otro',
            'name.regex' => 'Formato no valido, solo letras,numeros o espacios entre ellas',

                    ];

            }


}
