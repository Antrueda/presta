<?php

namespace App\Models\Medicamentos;

use Illuminate\Database\Eloquent\Model;

class MedicameSisClinica extends Model
{
    protected $table = 'medicame_sis_clinica';

    protected $fillable = [
        'sis_clinica_id',
        'medicame_id',

        'user_crea_id',
        'user_edita_id',
        'sis_esta_id',
        'created_at',
        'updated_at',
    ];
}
