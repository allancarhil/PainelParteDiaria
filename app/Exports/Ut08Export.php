<?php

namespace App\Exports;

use App\Models\Api;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Ut08Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        $api = new Api();
        $dados = $api->getAll("ut08");

        return view('exports.ut08Exports', [
            'dados' => $dados
        ]);
    }
}
