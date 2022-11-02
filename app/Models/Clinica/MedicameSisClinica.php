<?php

namespace App\Models\Clinica;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MedicameSisClinica extends Pivot
{
    protected $fillable = [
        'sis_esta_id',
        'cobrsepa',
        'user_crea_id',
        'user_edita_id'
    ];
}
