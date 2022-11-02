<?php

namespace App\Models\Administracion\Rango\Logs;

use App\Models\Administracion\Rango;
use App\Models\Medicamentos\Npt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HRnpt extends Model
{
    protected $fillable = [
        'rango_id',
        'npt_id',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];


}
