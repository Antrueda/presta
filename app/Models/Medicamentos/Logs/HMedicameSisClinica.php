<?php

namespace App\Models\Medicamentos\Logs;

use Illuminate\Database\Eloquent\Model;

class HMedicameSisClinica extends Model
{
    protected $table = 'medicame_sis_clinica';

    protected $fillable = [
        'sis_clinica_id',
        'medicame_id',

        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
        'created_at',
        'updated_at',
    ];
}
