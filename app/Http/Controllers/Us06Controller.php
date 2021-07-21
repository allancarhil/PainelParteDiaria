<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;
use App\Exports\Us06Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Us06Controller extends Controller{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("us06/data/" . $data);

            return view('us06.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function form(){

        return view('us06.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("us06/" . $id);

            $pdf = PDF::loadView('us06.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('us06-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
    public function exportExcel(){

        try{
            return Excel::download(new Us06Export, 'us06.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
