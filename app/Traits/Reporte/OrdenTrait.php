<?php

namespace App\Traits\Reporte;

use App\Models\Reportes\Orden;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

trait OrdenTrait
{
    use DatatableTrait;
    public function getOrdenes(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .  $this->opciones['carpetax'] . '.Botones.acciones';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            /**
             * conocer los rangos de la clinica
             */
            $ordenxxx = Orden::select([
                'ordens.id', 'ordens.ordeprod', 'ordens.observac','ordens.sis_esta_id',
                'sis_estas.s_estado', 'ordens.created_at'
            ])
                ->join('sis_estas', 'ordens.sis_esta_id', '=', 'sis_estas.id');;

            return $this->getDttb($ordenxxx, $request);
        }
    }
}
