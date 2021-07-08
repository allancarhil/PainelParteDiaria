<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;

class Ut37Controller extends Controller{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("ut37/data/" . $data);

            return view('ut37.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('ut37.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("ut37/" . $id);

            $pdf = PDF::loadView('ut37.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('ut37-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
}
