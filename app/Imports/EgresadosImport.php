<?php

namespace App\Imports;

use App\Models\Academico;
use App\Models\Egresado;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpParser\Node\Stmt\Foreach_;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Throwable;

//SkipsOnError: Permite mostrar un error de mensaje en caso haya en el excel
//WithHeadingRow: Permite poner cabecera. Es importante que el excel tenga el mismo nombre de las cabeceras de los nombres de la derecha.
//WithValidation: Valida los datos del excel
//WithStartRow: importa desde la fila que se desee. Puede ser fila 2, 3. etc.
class EgresadosImport implements ToModel, WithValidation, WithStartRow
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
        try {
            $this->carr_profesional=Academico::pluck('id_academico','carr_profesional');
        } catch (\Throwable $th) {
            
        }

    }

    public function model(array $row)
    {
        //$id_academico = "Ingeniería de Sistemas";
        //$id_academico = $row['18'];
        /* $id_academico = 5; */
        /* if ($id_academico <> "Administración de Empresas") {
            $id_academico = [5,5,5,5,5];
        }
        else{
            $id_academico  = $this->carr_profesional[$id_academico];

        } */

        return new Egresado([
            'matricula'             => $row['0'],
            'ap_paterno'            => $row['1'],
            'ap_materno'            => $row['2'],
            'nombres'               => $row['3'],
            'id_academico'          => $this->carr_profesional[$row['4']],
            'grado_academico'       => $row['5'],
            'dni'                   => $row['6'],
            'genero'                => $row['7'],
            'fecha_nacimiento'      => $row['8'],
            'año_ingreso'           => $row['9'],
            'semestre_ingreso'      => $row['10'],
            'año_egreso'            => $row['11'],
            'semestre_egreso'       => $row['12'],
            'celular'               => $row['13'],
            'pais_origen'           => $row['14'],
            'departamento_origen'   => $row['15'],
            'pais_residencia'       => $row['16'],
            'ciudad_residencia'     => $row['17'],
            'lugar_residencia'      => $row['18'],

            //'id_academico'          => $row['18'],
            //'id_academico'          => $qqr2,
        ]);
    }
    //Importar desde fila 2 del excel
    public function startRow(): int
    {
        return 2;
    }
    /* public function onError(Throwable $error)
    {

    } */

    //Función para validar los datos a la hora de importar
    public function rules(): array
    {
        return [
            //Aqui se está validando en el campo matricula de la bd que el codigo debe ser único
            '0' =>[
                'integer','unique:egresado,matricula', 'digits:10','required'
           ],
            '1' => [
                'string','required','nullable'
            ],
            '2' => [
                'string', 'required','nullable'
            ],
            '3' => [
                'string', 'required','nullable'
            ],
            '4' => [
                'required'
            ],
            '5' => [
                'string', 'nullable'
            ],
            '6' => [
                'integer', 'unique:egresado,dni', 'digits:8', 'nullable'
            ],
            '7' => [
                'string', 'nullable'
            ],
            '8' => [
                'date', 'nullable'
            ],
            '9' => [
                'integer', 'nullable'
            ],
            '10' => [
                'integer', 'nullable'
            ],
            '11' => [
                'integer', 'nullable'
            ],
            '12' => [
                'integer', 'nullable'
            ],
            '13' => [
                'integer', 'nullable'
            ],
            '14' => [
                'string', 'nullable'
            ],
            '15' => [
                'string', 'nullable'
            ],
            '16' => [
                'string', 'nullable'
            ],
            '17' => [
                'string', 'nullable'
            ],
            '18' => [
                'string', 'nullable'
            ],

            /* 'qqr2' => [
                'required','digits_between:1,5'
            ], */

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
            '4' => 'carrera profesional',
            '5' => 'grado académico',
            '6' => 'DNI',
            '7' => 'género',
            '8' => 'fecha de nacimiento',
            '9' => 'año de ingreso',
            '10' => 'semestre de ingreso',
            '11' => 'año de egreso',
            '12' => 'semestre de egreso',
            '13' => 'celular',
            '14' => 'país de origen',
            '15' => 'departamento de origen',
            '16' => 'país de residencia',
            '17' => 'ciudad de residencia',
            '18' => 'lugar de residencia',
        ];

    }

    /* public function customValidationMessages()
    {

        return [
            '18.digits' => 'No existe la carrera con ese nombre. Digite exactamente las carreras: Ingeniería de Sistemas, Ingeniería Electrónica y Telecomunicaciones, Ingeniería Ambiental, Ingeniería Mecánica y Eléctrica o Administración de Empresas',


        ];
    } */
}
