<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use PDF;
use App\Models\Api;

class Uc14Controller extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("uc14/data/" . $data);

            return view('uc14.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('uc14.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("uc14/" . $id);

            $pdf = PDF::loadView('uc14.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('uc14-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
}
