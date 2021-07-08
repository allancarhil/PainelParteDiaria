<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Api;
use App\Exports\RelatoriosExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
//use Maatwebsite\Excel\Excel as ExcelExcel;

use PDF;
class Mn01Controller extends Controller
{
    public function data(Request $request){

        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("mn01/data/" . $data);

            return view('mn01.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function form(){

        return view('mn01.form');
    }

    public function exportPDF($id){

        try{
            $api = new Api();
            $d = $api->getAll("mn01/" . $id);

            $pdf = PDF::loadView('mn01.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('mn01-relatorio.pdf', array("Attachment" => true));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function exportExcel($id){

        try{

            $api = new Api();
            $d = $api->getAll("mn01/" . $id);

            Excel::create('New file', function($excel) {

                $excel->sheet('New sheet', function($sheet) {
            
                    $sheet->loadView('mn01.pdf');
            
                });
            
            });

            //RelatoriosExport::useExcel();
            //$relatorio =  new RelatoriosExport();

           // dd($relatorio);
           return Excel::download($d, 'users.xlsx');
           //$excel = new RelatoriosExport();
           
           //$d = $excel->collection();

           //$dados = (object) $d;
           //var_dump($dados);
           //return Excel::download($dados, 'users.xlsx');
           



        }catch(Exception $error){
            echo  $error;
        }
    }
}
