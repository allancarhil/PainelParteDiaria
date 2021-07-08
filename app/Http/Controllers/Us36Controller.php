<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use PDF;
use App\Models\Api;
use App\Exports\Us36Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Us36Controller extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("us36/data/" . $data);

            return view('us36.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('us36.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("us36/" . $id);

            $pdf = PDF::loadView('us36.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('us36-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function exportExcel(){

        try{
            return Excel::download(new Us36Export, 'us36.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }

}
