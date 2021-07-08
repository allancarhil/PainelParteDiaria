<?php

namespace App\Exports;

use App\Models\Api;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Us36Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        $api = new Api();
        $dados = $api->getAll("us36");

        return view('exports.us36Exports', [
            'dados' => $dados
        ]);
    }
}
