<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;
use App\Exports\Ut07Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Ut07Controller extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("ut07/data/" . $data);

            return view('ut07.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('ut07.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("ut07/" . $id);

            $pdf = PDF::loadView('ut07.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('ut07-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
    public function exportExcel(){

        try{
            return Excel::download(new Ut07Export, 'us36.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }

}
