<?php
namespace App\Models\Produccion\Logs;

use App\Models\Formulaciones\Cformula;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HTerminado extends Model
{

  protected $fillable = [
    'completo',
    'particul',
    'integrid',
    'contenid',
    'fugasxxx',
    'miscelas',
    'burbujas',
    'document',
    'teorico_',
    'realxxx_',
    'pesobols',
    'limitesx',
    'concepto',
    'estaterm',
    'nopasaxx',
    'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx',
  ];


}
