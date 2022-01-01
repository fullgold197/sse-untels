<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EgresadosExport;
use App\Imports\EgresadosImport;

class ReporteAdminController extends Controller
{
    //
    public function showReporteEgresados( Request $request,$string)
    {
        if( $string == "empty" )

        $string = "";

        $egresados = Egresado::select()
        ->where( 'habilitado','=', 1 )
        ->orderBy( 'ap_paterno', 'desc' )
        ->get();

        $pdf = PDF::LoadView('admin.egresado.pdf',compact('egresados'),['valor2'=>$string]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
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

