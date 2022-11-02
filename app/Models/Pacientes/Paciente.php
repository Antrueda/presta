<?php

namespace App\Models\Pacientes;

use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Npt;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{

    protected $fillable = [
        'registro',
        'cedula',
        'nombres',
        'apellidos',
        'peso',
        'genero_id',
        'ep_id',
        'cama',
        'fechnaci',
        'departamento_id',
        'municipio_id',
        'npt_id',
        'servicio_id',
        'sis_esta_id',
        'user_crea_id',
        'sis_clinica_id',
        'user_edita_id'
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'user_crea_id');
    }
    public function editor()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function ep()
    {
        return $this->belongsTo(Ep::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class)->withTimestamps();
    }

    public function sis_clinicas()
    {
        return $this->belongsToMany(SisClinica::class)->withTimestamps();
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function npt()
    {
        return $this->belongsTo(Npt::class);
    }

    public function sis_esta()
    {
        return $this->belongsTo(SisEsta::class);
    }
    public function sis_clinica()
    {
        return $this->belongsTo(SisClinica::class);
    }


    public static function transaccion($dataxxxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx) {
            $dataxxxx['requestx']->cama  = strtoupper($dataxxxx['requestx']->cama);
            $dataxxxx['requestx']->nombres = strtoupper($dataxxxx['requestx']->nombres);
            $dataxxxx['requestx']->apellidos = strtoupper($dataxxxx['requestx']->apellidos);

            $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::user()->id]);
            if ($dataxxxx['modeloxx'] != '') {
                $dataxxxx['modeloxx']->update($dataxxxx['requestx']->all());
            } else {
                $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::user()->id]);
                $dataxxxx['modeloxx'] = Paciente::create($dataxxxx['requestx']->all());
            }
            return $dataxxxx['modeloxx'];
        }, 5);
        return $usuariox;
    }
    public static function getPaciente($dataxxxx)
    {
        $paciente = Paciente::where('id', $dataxxxx['padrexxx'])->first();
        return $paciente;
    }

    public static function combo($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = Paciente::get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombres . ' ' . $registro->apellidos];
            } else {
                $comboxxx[$registro->id] = $registro->nombres . ' ' . $registro->apellidos;
            }
        }

        return $comboxxx;
    }
}
