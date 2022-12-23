<?php

namespace App\Imports;

use App\Models\Academico;
use App\Models\Egresado;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
        if ($row['5']) {
            $habilitado = 1;
        }
        else{
            $habilitado = 0;
        }
        return new Egresado([
            'matricula'             => $row['0'],
            'ap_paterno'            => $row['1'],
            'ap_materno'            => $row['2'],
            'nombres'               => $row['3'],
            'id_academico'          => Auth::user()->id_academico,
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
            'habilitado'            => $habilitado,
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
            /* '4' => [
                'required'
            ], */
            '4' => [
                'string', 'nullable'
            ],
            '5' => [
                'integer', 'unique:egresado,dni', 'digits:8', 'nullable'
            ],
            '6' => [
                'string', 'nullable'
            ],
            '7' => [
                'date', 'nullable'
            ],
            '8' => [
                'integer', 'nullable', 'digits:4'
            ],
            '9' => [
                'integer', 'nullable', 'digits:1'
            ],
            '10' => [
                'integer', 'nullable', 'digits:4'
            ],
            '11' => [
                'integer', 'nullable', 'digits:1'
            ],
            '12' => [
                'integer', 'nullable', 'digits:9'
            ],
            '13' => [
                'string', 'nullable','max:50'
            ],
            '14' => [
                'string', 'nullable','max:50'
            ],
            '15' => [
                'string', 'nullable','max:50'
            ],
            '16' => [
                'string', 'nullable','max:50'
            ],
            '17' => [
                'string', 'nullable','max:255'
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
            /* '4' => 'carrera profesional', */
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
        ];

    }

    /* public function customValidationMessages()
    {

        return [
            '18.digits' => 'No existe la carrera con ese nombre. Digite exactamente las carreras: Ingeniería de Sistemas, Ingeniería Electrónica y Telecomunicaciones, Ingeniería Ambiental, Ingeniería Mecánica y Eléctrica o Administración de Empresas',


        ];
    } */
}
