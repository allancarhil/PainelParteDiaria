<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Exception;
use App\Models\Api;

class Ut08Controller extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("ut08/data/" . $data);

            return view('ut08.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('ut08.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("ut08/" . $id);

            $pdf = PDF::loadView('ut08.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('ut08-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
}