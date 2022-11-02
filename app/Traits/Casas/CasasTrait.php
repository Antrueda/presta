<?php

namespace App\Traits\Casas;

use App\Models\Medicamentos\Casa;
use App\Traits\DatatableTrait;

trait CasasTrait
{
    use DatatableTrait;

    public function getListados($request)
    {
        $clinicas = Casa::select(['casas.id', 'casas.casa', 'sis_estas.s_estado',
        'casas.unidmedi','casas.ordecasa',
        'casas.nameidxx', 'casas.sis_esta_id'])
            ->join('sis_estas', 'casas.sis_esta_id', '=', 'sis_estas.id');
        return $this->getDatatable($clinicas, $request);
    }
}
