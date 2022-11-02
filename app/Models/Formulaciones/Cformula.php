<?php

namespace App\Models\Formulaciones;

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

class Cformula extends Model
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
        'sis_esta_id',
        'user_crea_id',
        'user_edita_id',
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'user_crea_id');
    }
    public function editor()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }

    public function userevis()
    {
        return $this->belongsTo(User::class, 'userevis_id');
    }
    public function sis_esta()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }
    public static function combo($casa, $medicamento)
    {
        $medic = '';
        $lista = ['' => 'Seleccione'];
        if (count($medicamento) > 0) {
            $medic = Medicame::whereIn('id', $medicamento)->get();
        } else {
            $medic = Medicame::where(['idcasa' => $casa])->get();
        }
        foreach ($medic as $key => $value) {
            $lista[$value->id] = $value->nombre;
        }
        return $lista;
    }

    public function formulacionactual($paciente, $clinica)
    {
        $respuest = false;
        $formulac = Cformula::where('paciente_id', $paciente)
            ->where('clinica_id', $clinica)
            ->where('created_at', 'like', date('Y-m-d', time()) . "%")->first();
        if (isset($formulac->id)) {
            $respuest = true;
        }
        return $respuest;
    }

    public function dformulas()
    {
        return $this->hasMany(Dformula::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function sis_clinica()
    {
        return $this->belongsTo(SisClinica::class);
    }

    public function procesos()
    {
        return $this->hasMany(Proceso::class);
    }
    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }

    public function terminado()
    {
        return $this->belongsTo(Terminado::class);
    }

    public static function combolote($valorxxx = false)
    {
        $listaxxx = 0;
        $formulac = Cformula::where('userprep_id', '>', 0)
            ->where('userevis_id', '>', 0)
            ->where('userproc_id', 0)
            ->where('created_at', 'like', date('Y-m-d', time()) . "%")->get();
        if ($valorxxx) {
            $listaxxx = count($formulac);
        } else {
            if (count($formulac) == 0) {
                $listaxxx = ['' => 'No hay preparaciones en este momento, vuelva a intentar más tarde'];
            } else {
                $listaxxx = ['' => 'Seleccione'];
            }

            foreach ($formulac as $value) {
                $listaxxx[$value->id] = $value->id;
            }
        }
        return $listaxxx;
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
    public function crango()
    {
        return $this->belongsTo(Crango::class);
    }
    public function alrtas()
    {
        return $this->hasMany(Alerta::class);
    }
    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['sis_esta_id'] = 1;
                $dataxxxx['total'] = $dataxxxx['volumen'] + $dataxxxx['purga'];
                $dataxxxx['orden_id'] = Orden::getOrdenDia();
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Cformula::create($dataxxxx);
                Alerta::create([
                    'tipoalert_id' => 2,
                    'tipoaccion_id' => 2,
                    'cformula_id' =>  $objetoxx->id,
                    'sis_clinica_id' =>  $objetoxx->sis_clinica_id,
                    'leidaxxx' => false,
                    'routexxx' => $objetoxx->id,
                    'user_crea_id' => Auth::user()->id,
                    'user_edita_id' => Auth::user()->id,
                    'sis_esta_id' => 1
                ]);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }

    public static function getCformulas($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        /**
         * hallar las formulaciones que ya se le hicieron control de proceso
         */
        $procesos = Proceso::where('created_at', 'like', date('Y-m-d', time()) . "%")->get();
        $notinxxx = [];
        foreach ($procesos as $procesox) {
            if (!in_array($procesox->cformula_id, $notinxxx)) {
                $notinxxx[] = $procesox->cformula_id;
            }
        }

        /**
         * hallar formulaciones que no se le han hecho contro de proceso
         */
        $activida = Cformula::where(function ($queryxxx) {
            $queryxxx->where('userevis_id', '>', 0);
            $queryxxx->where('userprep_id', '>', 0);
            $queryxxx->where('userproc_id',  null);
            $queryxxx->where('created_at', 'like', date('Y-m-d', time()) . "%");
            return $queryxxx;
        })
            ->get();
        foreach ($activida as $registro) {
            if (!in_array($registro->id, $notinxxx)) {
                if ($dataxxxx['ajaxxxxx']) {
                    $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => 'Formulación: ' . $registro->id];
                } else {
                    $comboxxx[$registro->id] = 'Formulación: ' . $registro->id;
                }
            }
        }
        if ($dataxxxx['isupdate'] > 0) {
            $registro = Cformula::where('id', $dataxxxx['isupdate'])->first();
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => 'Formulación: ' . $registro->id];
            } else {
                $comboxxx[$registro->id] = 'Formulación: ' . $registro->id;
            }
        } else {
            /**
             * no hay preparaciones
             */
            if (count($comboxxx) == 1) {
                if ($dataxxxx['ajaxxxxx']) {
                    $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'No hay preparaciones en este momento, vuelva a intentar más tarde'];
                } else {
                    $comboxxx = ['' => 'No hay preparaciones en este momento, vuelva a intentar más tarde'];
                }
            }
        }
        return $comboxxx;
    }
}
