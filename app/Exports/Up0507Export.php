<?php

namespace App\Exports;

use App\Models\Api;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Up0507Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        $api = new Api();
        $dados = $api->getAll("up0507");

        return view('exports.up0507Exports', [
            'dados' => $dados
        ]);
    }
}
