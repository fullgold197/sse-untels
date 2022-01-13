<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresadoEditRequest extends FormRequest
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
        /* $egresado = $this->route('egresado'); */
        return [


            //Para hacer una validación adecuada es necesario poner al final del la linea la llave primaria de la fila. En este caso la llave se llama matricula. Si no se pone esto va a salir un error.

            'matricula' => 'required|unique:egresado,matricula,'.$this->egresado.',matricula',
            'ap_paterno' => 'required|alpha',
            'ap_materno' => 'required|alpha',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|integer',
            'dni' => 'required|unique:egresado,dni,'.$this->egresado. ',matricula',
            /* 'matricula_hidden' =>$this->egresado.'matricula', */
        ];
    }

    public function messages(){

        return [

                'matricula.integer' => 'Formato no valido, solo numeros',
                'matricula.unique' => 'El codigo ya existe, por favor eliga otro',
                'ap_paterno.alpha' => 'Formato no valido, solo letras sin espacios entre ellas',
                'ap_materno.alpha' => 'Formato no valido, solo letras sin espacios entre ellas',
                'nombres.regex' => 'Formato no valido, solo letras o espacios entre ellas',
                'telefono.integer' => 'Formato no valido, solo numeros',




                    ];

            }

}
