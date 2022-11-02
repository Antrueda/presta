<?php

namespace App\Models;

use App\Models\Clinica\SisClinica;
use App\Models\Formulaciones\Cformula;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{

    protected $fillable = [
         'leidaxxx', 'routexxx', 'tipoaccion_id', 'cformula_id','sis_esta_id','user_crea_id','user_edita_id'
    ];

    public function clinica()
    {
        return $this->belongsTo(SisClinica::class);
    }

    public function cformula()
    {
        return $this->belongsTo(Cformula::class);
    }

    public function tipoaccion()
    {
        return $this->belongsTo(Tipoaccion::class);
    }

    public function tipoalert()
    {
        return $this->belongsTo(Tipoalert::class);
    }
}
