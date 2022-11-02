<?php

namespace App\Models\Logs;

use App\Models\Clinica\SisClinica;
use App\Models\Formulaciones\Cformula;
use Illuminate\Database\Eloquent\Model;

class HAlerta extends Model
{

    protected $fillable = [
         'leidaxxx', 'routexxx', 'tipoaccion_id', 'cformula_id',  'user_edita_id', 'user_crea_id',  'id_old',
         'sis_esta_id',
         'rutaxxxx',
         'metodoxx',
         'ipxxxxxx',
    ];


}
