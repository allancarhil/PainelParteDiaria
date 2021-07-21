<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use PDF;
use App\Models\Api;
use App\Exports\Up0507Export;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Up0507Controller extends Controller
{
    public function data(Request $request){
        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("up0506/data/" . $data);

            return view('up0507.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }


    public function form(){

        return view('up0507.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("up0506/" . $id);

            $pdf = PDF::loadView('up0507.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('up0507-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }
    public function exportExcel(){

        try{
            return Excel::download(new Up0507Export, 'up0507.xlsx');

        }catch(Exception $error){
            echo  $error;
        }
    }
}
