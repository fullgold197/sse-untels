<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EgresadosExport;
use App\Imports\EgresadosImport;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\DB;

class ReporteAdminController extends Controller
{
    //
    public function showReporteEgresados( Request $request,$string)
    {
        if( $string == "empty" )

        $string = "";

        //selecciona los campos de la tabla egresado
        $egresados = DB::table('egresado')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'egresado.grado_academico', 'egresado.dni', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.año_ingreso', 'egresado.semestre_ingreso', 'egresado.año_egreso', 'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'egresado.linkedin', 'academico.carr_profesional')
        ->where('habilitado', '=', 1)
        ->orderBy('ap_paterno', 'desc')
        ->get();
        /* $egresados = Egresado::select()
        ->where( 'habilitado','=', 1 )
        ->orderBy( 'ap_paterno', 'desc' )
        ->get(); */

        $pdf = PDF::LoadView('admin.egresado.pdf',compact('egresados'),['valor2'=>$string])->setPaper('a4', 'landscape'); //->setPaper('a4', 'landscape') permite colocar la hoja en horizontal
        return $pdf->stream();


    }
    /* public function listdata()
    {
        $pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('test_pdf.pdf');
    } */
    public function exportExcel(){

        return Excel::download(new EgresadosExport,'egresados-list.xlsx');

    }

    public function VistaimportExcel(){


        return view('admin.egresado.import');

    }
    public function importExcel(Request $request){

        $file=$request->file('file');
        Excel::import(new EgresadosImport,$file);
        return redirect()->to(url('admin/egresado'));

    }

}

