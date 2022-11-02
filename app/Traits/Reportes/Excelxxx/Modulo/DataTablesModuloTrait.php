<?php

namespace App\Traits\Reportes\Excelxxx\Modulo;



/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait DataTablesModuloTrait
{
    /**
     * grabar o actualizar registros para paises
     *
     * @param array $dataxxxx
     * @return $usuariox
     */
    public function getTablas($dataxxxx)
    {
        $dataxxxx['tablasxx'] = [

        ];
        $dataxxxx['ruarchjs'] = [
            ['jsxxxxxx' => $dataxxxx['rutacarp'] . $dataxxxx['carpetax'] . '.Js.tabla']
        ];
        return $dataxxxx;
    }

}
