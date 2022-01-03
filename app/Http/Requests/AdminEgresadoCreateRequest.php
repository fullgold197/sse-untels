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

             'egresado_matricula'=> 'required|integer|unique:users,egresado_matricula',
             // 'matricula' => 'required|unique:users_table,user_name,'.$id.',user_id' ,

              'email' => 'required|unique:users|email',

              'name' => 'required|regex:/^[\pL\s\-]+$/u',

        ];
    }
    public function messages(){

        return [
            'egresado_matricula.integer' => 'Formato no valido, solo numeros',
            'egresado_matricula.unique' => 'El codigo ya existe, por favor eliga otro',
            'email.email' => 'Formato no valido para correo',
            'email.unique' => 'El correo ya existe, por favor eliga otro',
            'name.regex' => 'Formato no valido, solo letras o espacios entre ellas'

                    ];

            }
}
