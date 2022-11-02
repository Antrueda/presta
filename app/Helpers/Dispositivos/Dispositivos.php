<?php

namespace App\Helpers\Dispositivos;

use App\Helpers\DatatableHelper;
use App\Models\Dispositivos\Dlote;
use App\Models\Dispositivos\Dmarca;
use App\Models\Dispositivos\Dmedico;

class Dispositivos
{
    public static function getDispositivos($request)
    {
        $paciente = Dmedico::select(
            'dmedicos.id',
            'dmedicos.nombrexx',
            's_estado',
            'dmedicos.sis_esta_id'
        )
            ->join('sis_estas', 'dmedicos.sis_esta_id', '=', 'sis_estas.id');
        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getMarcas($request)
    {
        $paciente = Dmarca::select(
            'dmarcas.id',
            'dmarcas.marcaxxx',
            'dmarcas.reginvim',
            'dmarcas.dmedico_id',
            's_estado',
            'dmarcas.sis_esta_id'
        )
            ->join('sis_estas', 'dmarcas.sis_esta_id', '=', 'sis_estas.id')
            ->where('dmarcas.dmedico_id', $request->padrexxx);
        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getLotes($request)
    {
        $paciente = Dlote::select(
            'dlotes.id',
            'dmarcas.marcaxxx',
            'dlotes.lotexxxx',
            'dmarcas.dmedico_id',
            's_estado',
            'dlotes.sis_esta_id'
        )
            ->join('dmarcas', 'dlotes.dmarca_id', '=', 'dmarcas.id')
            ->join('sis_estas', 'dlotes.sis_esta_id', '=', 'sis_estas.id')
            ->where('dmarcas.dmedico_id', $request->padrexxx);
        return DatatableHelper::getDatatable($paciente, $request);
    }
}
