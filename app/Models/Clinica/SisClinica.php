<?php

namespace App\Models\Clinica;

use App\Models\Administracion\Rango;
use App\Models\Medicamentos\Medicame;
use App\Models\Sistema\Municipio;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SisClinica extends Model
{
    protected $fillable = [
         'sucursal','clinica_id', 'municipio_id', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
    ];
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_crea_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }
    public function sis_esta()
    {
        return $this->belongsTo(SisEsta::class);
    }
    public function clinica()
    {
        return $this->belongsTo(Clinica::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    public function medicames()
    {
        return $this->belongsToMany(Medicame::class)->withTimestamps()->withPivot(['sis_esta_id','cobrsepa',]);
    }
    public function rangos()
    {
        return $this->belongsToMany(Rango::class)->withTimestamps();
    }
    public static function transaccion($dataxxxx)
    {
        $objetoxx = DB::transaction(function () use ($dataxxxx) {

            $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::user()->id]);
            if ($dataxxxx['modeloxx'] != '') {
                $dataxxxx['modeloxx']->update($dataxxxx['requestx']->all());
            } else {
                $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::user()->id]);
                $dataxxxx['modeloxx'] = SisClinica::create($dataxxxx['requestx']->all());
            }
            return $dataxxxx['modeloxx'];
        }, 5);
        return $objetoxx;
    }


    public static function combo($cabecera, $ajaxxxxx)
    {
        $comboxxx = [];
        if ($cabecera) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = SisClinica::get();
        foreach ($activida as $key=> $registro) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->sucursal];
            } else {
                $comboxxx[$registro->id] = $registro->sucursal;
            }
        }
        return $comboxxx;
    }

    public static function getclinica($cabecera, $ajaxxxxx)
    {
        $comboxxx = [];
        if ($cabecera) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = SisClinica::where('id',Auth::user()->sis_clinica_id)->get();;
        foreach ($activida as $key=> $registro) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->sucursal];
            } else {
                $comboxxx[$registro->id] = $registro->sucursal;
            }
        }
        return $comboxxx;
    }
}
