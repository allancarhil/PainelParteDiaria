<?php

namespace App\Exports;

use App\Models\Api;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Ub02Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        $api = new Api();
        $dados = $api->getAll("ub02");

        return view('exports.ub02Exports', [
            'dados' => $dados
        ]);
    }
}
