<?php

namespace App\Models\Medicamentos\Logs;

use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HCasa extends Model
{

    protected $fillable = [
        'casa', 'sis_esta_id', 'ordecasa', 'nameidxx', 'unidmedi', 'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];


}
