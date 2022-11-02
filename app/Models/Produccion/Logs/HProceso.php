<?php

namespace App\Models\Produccion\Logs;

use App\Models\Formulaciones\Cformula;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HProceso extends Model
{

  protected $fillable = [
    'coloraci',
    'ausepart',
    'ausefuga',
    'ausemise',
    'nopasaxx',
    'listermi',
    'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx',

  ];


}
