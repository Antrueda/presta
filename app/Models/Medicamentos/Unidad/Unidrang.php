<?php

namespace App\Models\Medicamentos\Unidad;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Unidrang extends Model
{
    protected $fillable = [
        'unidad_id', 'rangonpt_id', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
    ];

    public function sis_esta()
    {
      return $this->belongsTo(SisEsta::class);
    }
    
    public function creador()
    {
      return $this->belongsTo(User::class, 'user_crea_id');
    }
  
    public function editor()
    {
      return $this->belongsTo(User::class, 'user_edita_id');
    }


    public function unidad()
    {
      return $this->belongsTo(Unidad::class);
    }
  
    public function rangonpt()
    {
      return $this->belongsTo(Rangonpt::class);
    }
    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Unidrang::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
