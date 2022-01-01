<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Egresado;

class EgresadoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //activar a true, por defecto es false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        return [

            //Nuestras reglas o validaciones

            'matricula'=> 'required|integer|unique:egresado',
           // 'matricula' => 'required|unique:users_table,user_name,'.$id.',user_id' ,

            //'email' => 'unique:table,email_column_to_check,id_to_ignore'

            'ap_paterno' => 'required|alpha',
            'ap_materno' => 'required|alpha',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|integer',

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
