<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EgresadosExport;
use App\Imports\EgresadosImport;
use App\Imports\ImportUser;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReporteAdminController extends Controller
{
    //Controlador para importar y exportar datos en formato Excel
    public function showReporteEgresados( Request $request,$string)
    {
        if( $string == "empty" )

        $string = "";

        //selecciona los campos de la tabla egresado
        $egresados = DB::table('egresado')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'egresado.grado_academico', 'egresado.dni', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.año_ingreso', 'egresado.semestre_ingreso', 'egresado.año_egreso', 'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'egresado.linkedin', 'academico.carr_profesional')
        /* ->where('habilitado', '=', 1) */
        ->where('egresado.id_academico',Auth::user()->id_academico)
        ->orderBy('ap_paterno', 'desc')
        ->get();
        /* $egresados = Egresado::select()
        ->where( 'habilitado','=', 1 )
        ->orderBy( 'ap_paterno', 'desc' )
        ->get(); */

        //Importa los datos en PDF
        $pdf = PDF::LoadView('admin.egresado.egresado_pdf',compact('egresados'),['valor2'=>$string])->setPaper('a4', 'landscape'); //->setPaper('a4', 'landscape') permite colocar la hoja en horizontal
        return $pdf->stream();


    }
    /* public function listdata()
    {
        $pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('test_pdf.pdf');
    } */

    //Exportar los datos del excel
    public function exportExcel(){

        return Excel::download(new EgresadosExport,'egresados-list.xlsx');

    }

    //Retorna hacia la vista para importar el excel
    public function VistaimportExcel(){
        return view('admin.egresado.egresado_import');
    }

    //Importa los datos del excel
    public function importExcel(Request $request){
        //Permite validar si el archivo es distinto de .xlsx
        $request->validate(
            [
                'file' => 'mimes:xlsx'
            ]
        );
        //Try para validar error de carrera profesional. Es necesario saber adecuadamente el error. En esta caso es ErrorExc.
        try {
            //El if ($request->hasFile('file')) sirve para validar si hay algun archivo vacio
        if ($request->hasFile('file')) {
            $file=$request->file('file');

            Excel::import(new EgresadosImport,$file);
                return redirect()->route('egresados.Import-excel')->with('success', 'Lista de egresados importados exitosamente.');

            }
            else{
                return redirect()->route('egresados.Import-excel');
            }
            /* return back()->withStatus('El archivo excel has sido importado.'); */
        } catch (\ErrorException $th) {
            return back()->withErrors('Error de tipeo en la columna carrera profesional. Digite exactamente las carreras de: "Ingeniería de Sistemas", "Ingeniería Electrónica y Telecomunicaciones","Ingeniería Ambiental","Ingeniería Mecánica y Eléctrica" o "Administración de Empresas"');
        }


    }

}

