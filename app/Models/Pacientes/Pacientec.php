<?php

namespace App\Models\Pacientes;

use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Npt;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Pacientec extends Model {

  protected $fillable = [
      'registro',
      'cedula',
      'nombres',
      'apelldios',
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

  public function genero() {
    return $this->belongsTo(Genero::class);
  }

  public function ep() {
    return $this->belongsTo(Ep::class);
  }

  public function servicio() {
    return $this->belongsTo(Servicio::class);
  }
  public function servicios() {
    return $this->belongsToMany(Servicio::class)->withTimestamps();
  }

  public function sis_clinicas() {
    return $this->belongsToMany(SisClinica::class)->withTimestamps();
  }

  public function municipio() {
    return $this->belongsTo(Municipio::class);
  }

  public function npt() {
    return $this->belongsTo(Npt::class);
  }

  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }
  public function sis_clinica() {
    return $this->belongsTo(SisClinica::class);
  }


  public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Paciente::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
