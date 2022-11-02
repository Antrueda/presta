<?php

namespace App\Traits\Produccion;

use App\Models\Produccion\ProPreplibe;
use Illuminate\Http\Request;

/**
 * realizar toda la lógica para pitar los formularios de alistamiento y conciliación
 */
trait ProListadoTrait
{
    public static function getDtb($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->botonesx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }
            )
            ->addColumn(
                's_estado',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->estadoxx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->addColumn(
                'created_at',
                function ($queryxxx) use ($requestx) {
                    return  explode(' ',$queryxxx->created_at)[0];
                }

            )
            ->rawColumns(['botonexx', 's_estado',])
            ->toJson();
    }
    public  function getListadox(Request $request)
    {
        $request->request->add([
            'botonesx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi',
            'estadoxx' => 'layouts.components.botones.estadosx',
            'routexxx' => [$this->opciones['routxxxx']],
        ]);

        $paciente = ProPreplibe::select([
            'pro_preplibes.id',
            'pro_preplibes.sis_esta_id',
            'userprep.name as userprep',
            'userevis.name as userevis',
            'sis_estas.s_estado', 'pro_preplibes.created_at'
        ])
            ->join('sis_estas', 'pro_preplibes.sis_esta_id', '=', 'sis_estas.id')
            ->join('users as userprep', 'pro_preplibes.userprep_id', '=', 'userprep.id')
            ->join('users as userevis', 'pro_preplibes.userevis_id', '=', 'userevis.id');
        return $this->getDtb($paciente, $request);
    }
}
