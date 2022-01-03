<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class AdminEgresadoEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//activar a true para que pase a la sgte funcion(sino no ejecutara el metodo rules()), por defecto es false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $users = $this->route('usuario'); //nombre de la ruta del controlador UsuarioController aunque ahi se llama usuario.index
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
            'email.unique' => 'El correo ya existe, por favor eliga otro',
            'name.regex' => 'Formato no valido, solo letras,numeros o espacios entre ellas',

                    ];

            }
}
