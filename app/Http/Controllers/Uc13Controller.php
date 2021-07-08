<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;

class Uc13Controller extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("uc13/data/" . $data);

            return view('uc13.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('uc13.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("uc13/" . $id);

            $pdf = PDF::loadView('uc13.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('uc13-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
}
