<?php

namespace App\Imports;

use App\Models\Academico;
use App\Models\egresado;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

//SkipsOnError: Permite mostrar un error de mensaje en caso haya en el excel
//WithHeadingRow: Permite que la primera fila del excel no se exporte
//WithValidation: Valida los datos del excel
class EgresadosImport implements ToModel, WithValidation
{
    /* use Importable,SkipsErrors,SkipsFailures; */
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $carr_profesional;

    //Este constructor junto con el comando pluck permite hacer una comparación del id de la tabla académico con el campo carr_profesional. Si la carrera profesional es igual a Ingeniería de Sistemas automaticamente lo convierte en el id que le corresponde que sería 1 y así sucesivamente para el resto de carreras.
    public function __construct(){
        $this->carr_profesional=Academico::pluck('id_academico','carr_profesional');
    }

    public function model(array $row)
    {
        return new Egresado([
            //
            /* 'matricula'             =>$row['codigo'],
            'ap_paterno'            =>$row['apellido_paterno'],
            'ap_materno'            =>$row['apellido_materno'],
            'nombres'               =>$row['nombres'],
            'grado_academico'       =>$row['grado_academico'],
            'dni'                   =>$row['dni'],
            'genero'                =>$row['genero'],
            'fecha_nacimiento'      =>$row['fecha_de_nacimiento'],
            'año_ingreso'           =>$row['anio_de_ingreso'],
            'semestre_ingreso'      =>$row['semestre_de_ingreso'],
            'año_egreso'            =>$row['anio_de_egreso'],
            'semestre_egreso'       =>$row['semestre_de_egreso'],
            'celular'               =>$row['telefono'],
            'pais_origen'           =>$row['pais_de_origen'],
            'departamento_origen'   =>$row['departamento_de_origen'],
            'pais_residencia'       =>$row['pais_de_residencia'],
            'ciudad_residencia'     =>$row['ciudad_de_residencia'],
            'lugar_residencia'      =>$row['direccion_de_residencia'],
            'id_academico'          =>$this->carr_profesional[$row['carrera']] */

            'matricula'             => $row['0'],
            'ap_paterno'            => $row['1'],
            'ap_materno'            => $row['2'],
            'nombres'               => $row['3'],
            'grado_academico'       => $row['4'],
            'dni'                   => $row['5'],
            'genero'                => $row['6'],
            'fecha_nacimiento'      => $row['7'],
            'año_ingreso'           => $row['8'],
            'semestre_ingreso'      => $row['9'],
            'año_egreso'            => $row['10'],
            'semestre_egreso'       => $row['11'],
            'celular'               => $row['12'],
            'pais_origen'           => $row['13'],
            'departamento_origen'   => $row['14'],
            'pais_residencia'       => $row['15'],
            'ciudad_residencia'     => $row['16'],
            'lugar_residencia'      => $row['17'],
            'id_academico'          => $this->carr_profesional[$row['18']]


        ]);
    }

    /* public function onError(Throwable $error)
    {

    } */
    /* public function customValidationMessages()
    {
        return [
            '1.integer' => 'qqr2',
        ];
    } */

    //Función para validar los datos a la hora de importar
    public function rules(): array
    {


        return [
            //Aqui se está validando en el campo matricula de la bd que el codigo debe ser único
            '0' =>[
                'integer','unique:egresado,matricula', 'digits:10', 'required'
           ],
            '1' => [
                'string','required'
            ],
            '2' => [
                'string', 'required'
            ],
            '3' => [
                'string', 'required'
            ],
            '4' => [
                'string', 'required'
            ],
            '5' => [
                'integer', 'unique:egresado,dni', 'digits:8', 'required'
            ],
            '6' => [
                'string', 'required'
            ],
            '7' => [
                'date', 'required'
            ],
            '8' => [
                'integer', 'required'
            ],
            '9' => [
                'integer', 'required'
            ],
            '10' => [
                'integer', 'required'
            ],
            '11' => [
                'integer', 'required'
            ],
            '12' => [
                'integer', 'required'
            ],
            '13' => [
                'string', 'required'
            ],
            '14' => [
                'string', 'required'
            ],
            '15' => [
                'string', 'required'
            ],
            '16' => [
                'string', 'required'
            ],
            '17' => [
                'string', 'required'
            ],
            '18' => [
                'string', 'required'
            ],




        ];
    }


    //Sirve para cambiar el nombre del campo. Por ejemplo, $row['0']. El valor 0 se puede reemplazar por otro como matricula, codigo, etc.
    public function customValidationAttributes()
    {
        return [
            '0' => 'código de matricula',
            '1' => 'apellidos paternos',
            '2' => 'apellidos maternos',
            '3' => 'nombres',
            '4' => 'grado académico',
            '5' => 'DNI',
            '6' => 'género',
            '7' => 'fecha de nacimiento',
            '8' => 'año de ingreso',
            '9' => 'semestre de ingreso',
            '10' => 'año de egreso',
            '11' => 'semestre de egreso',
            '12' => 'celular',
            '13' => 'país de origen',
            '14' => 'departamento de origen',
            '15' => 'país de residencia',
            '16' => 'ciudad de residencia',
            '17' => 'lugar de residencia',
            '18' => 'carrera profesional',
        ];

    }

    /* public function messages()
    {

        return [
            '0.digits_between' => 'qqr2',
            '5' => 'r2beat',

        ];
    } */
}
