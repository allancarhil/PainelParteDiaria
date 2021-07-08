<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;
use App\Exports\Ub02Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Ub02Controller extends Controller{
    
    #Função pega a data passada por parametro, consulta os dados no banco e retorna pra view
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("ub02/data/" . $data);

            return view('ub02.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function form(){

        return view('ub02.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("ub02/" . $id);

            $pdf = PDF::loadView('ub02.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('ub02-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function exportExcel(){

        try{
            return Excel::download(new Ub02Export, 'ub02.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
