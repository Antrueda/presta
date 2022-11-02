<?php

namespace App\Models\Formulaciones\Logs;

use App\Models\Alerta;
use App\Models\Clinica\Crango;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;
use App\Models\Pacientes\Paciente;
use App\Models\Produccion\Proceso;
use App\Models\Produccion\Terminado;
use App\Models\Sistema\SisEsta;
use App\Traits\Produccion\InventarioTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HCformula extends Model
{
    use InventarioTrait;
    protected $fillable = [
        'paciente_id',
        'sis_clinica_id',
        'proceso_id',
        'terminado_id',
        'tiempo',
        'volumen',
        'velocidad',
        'purga',
        'total',
        'peso',
        'userevis_id',
        'userprep_id',
        'carbvali',
        'concarbo',
        'concprov',
        'concprot',
        'conclipv',
        'conclipi',
        'osmolari',
        'osmolarv',
        'gramtota',
        'protnitr',
        'proteica',
        'caloprov',
        'caloprot',
        'calolipv',
        'calolipi',
        'calocarv',
        'calocarb',
        'calototv',
        'calotota',
        'caltotkg',
        'calcfosf',
        'calcfosv',
        'pesoteor',
        'orden_id',
        'crango_id',
        'terminado_id',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];


}
