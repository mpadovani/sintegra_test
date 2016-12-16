<?php

namespace App\Http\Controllers\Sintegra;

use App\Model\Sintegra;
use App\Http\Controllers\Controller;


class SintegraController extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function loadSintegra() {

        $sintegra =  \DB::select("SELECT s.id, u.usuario, s.cnpj, s.resultado_json FROM sintegra s LEFT JOIN usuario u ON u.id = s.idusuario");

        foreach ($sintegra as $key => $value) {

            $value->resultado_json = substr_replace($value->resultado_json, (strlen($value->resultado_json) > 130 ? '...' : ''), 130);
        }
        return view('/sintegra/listar-sintegra', [ 'sintegra' => $sintegra ] );
    }

}
