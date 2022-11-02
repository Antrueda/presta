<?php

namespace App\Models\Clinica;

use App\Models\Administracion\Rango\Rcodigo;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Crango extends Model
{
    protected $fillable = [
        'sis_clinica_id',
        'rcodigo_id',
        'sis_esta_id',
        'user_crea_id',
        'user_edita_id'
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
    public function rcodigo()
    {
        return $this->belongsTo(Rcodigo::class);
    }

    public function sis_clinica()
    {
        return $this->belongsTo(SisClinica::class);
    }
    public static function transaccion($dataxxxx)
    {
        $objetoxx = DB::transaction(function () use ($dataxxxx) {

            $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::user()->id]);
            if ($dataxxxx['modeloxx'] != '') {
                $dataxxxx['modeloxx']->update($dataxxxx['requestx']->all());
            } else {
                $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::user()->id]);
                $dataxxxx['modeloxx'] = Crango::create($dataxxxx['requestx']->all());
            }
            return $dataxxxx['modeloxx'];
        }, 5);
        return $objetoxx;
    }
}
