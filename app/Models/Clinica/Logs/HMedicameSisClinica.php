<?php

namespace App\Models\Clinica\Logs;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HMedicameSisClinica extends Pivot
{
    protected $fillable = [

        'cobrsepa',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];
}
