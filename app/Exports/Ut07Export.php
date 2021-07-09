<?php

namespace App\Exports;

use App\Models\Api;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Ut07Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        $api = new Api();
        $dados = $api->getAll("ut07");

        return view('exports.ut07Exports', [
            'dados' => $dados
        ]);
    }
}
