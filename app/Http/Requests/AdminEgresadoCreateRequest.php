<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEgresadoCreateRequest extends FormRequest
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
        return [
            //
             //Nuestras reglas o validaciones

             'egresado_matricula'=> 'required|integer|bail|unique:users,egresado_matricula',


            'email' => 'required|unique:users|email',

            'name' => 'required|regex:/^[a-zA-Z0-9,.!? ]*$/',

        ];
    }
    public function messages(){

        return [
            'egresado_matricula.integer' => 'Formato no valido, solo numeros',
            'egresado_matricula.unique' => 'El codigo ya existe, por favor eliga otro',
            'email.email' => 'Formato no valido para correo',
            'email.unique' => 'El correo ya existe. Por favor cambie el código de egresado.',
            'name.regex' => 'Formato no valido, solo letras, números o espacios entre ellas',

                    ];

            }
}
