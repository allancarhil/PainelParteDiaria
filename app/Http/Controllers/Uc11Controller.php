<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;
use App\Exports\Uc11Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Uc11Controller extends Controller{

    public function data(Request $request){
        
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("uc11/data/" . $data);

            return view('uc11.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function form(){

        return view('uc11.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("uc11/" . $id);

            $pdf = PDF::loadView('uc11.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('uc11-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
    public function exportExcel(){

        try{
            return Excel::download(new Uc11Export, 'uc11.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
