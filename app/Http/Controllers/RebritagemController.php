<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PDF;
use App\Models\Api;
use App\Exports\RebritagemExport;
use Maatwebsite\Excel\Facades\Excel as Excel;

class RebritagemController extends Controller{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("rebritagem/data/" . $data);

            return view('rebritagem.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function form(){

        return view('rebritagem.form');
    }

    public function exportPDF($id){
        try{
            $api = new Api();
            $d = $api->getAll("rebritagem/" . $id);

            $pdf = PDF::loadView('rebritagem.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('rebritagem-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
    public function exportExcel(){

        try{
            return Excel::download(new RebritagemExport, 'rebritagem.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
