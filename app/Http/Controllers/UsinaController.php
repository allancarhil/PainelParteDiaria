<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;
use App\Exports\UsinaExport;
use Maatwebsite\Excel\Facades\Excel as Excel;

class UsinaController extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("usina/data/" . $data);

            return view('usina.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('usina.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("usina/" . $id);

            $pdf = PDF::loadView('usina.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('usina-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
    public function exportExcel(){

        try{
            return Excel::download(new UsinaExport, 'usina.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
