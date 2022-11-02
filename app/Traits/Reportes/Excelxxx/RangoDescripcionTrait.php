<?php

namespace App\Traits\Reportes\Excelxxx;



/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait RangoDescripcionTrait
{
    /**
     * grabar o actualizar registros para paises
     *
     * @param array $dataxxxx
     * @return $usuariox
     */
    public function getDescripcion($crangoxx)
    {
        $rcondici=$crangoxx->rcondici;
        $rangoxxx=$rcondici->rnpt->rango;
        return 'NPT '.$rcondici->rnpt->npt->nombre.' DE '.$rangoxxx->ranginic.' A '.$rangoxxx->rangfina.' CC '.$rcondici->condicio->condicio;
    }
}
