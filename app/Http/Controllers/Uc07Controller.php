<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use PDF;
use App\Models\Api;
use App\Exports\Uc07Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Uc07Controller extends Controller{

    #Função pega a data passada por parametro, consulta os dados no banco e retorna pra view
    public function data(Request $request){

        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("uc07/data/" . $data);

            return view('uc07.list', compact('dados'));
            
        }catch(Exception $error ){
            return view('error', compact('error'));

        }
    }

    #função chama o formulário
    public function form(){
        return view('uc07.form');

    }

    public function exportPDF($id){
        try{
            $api = new Api();
            $d = $api->getAll("uc07/" . $id);
                
            $pdf = PDF::loadView('uc07.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('uc07-relatorio.pdf', array("Attachment" => true));

        }catch(Exception $error ){
            return view('error', compact('error'));
            
        } 
    }
    public function exportExcel(){

        try{
            return Excel::download(new Uc07Export, 'uc07.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
