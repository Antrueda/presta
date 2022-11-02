<?php

namespace App\Models\Sistema;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SisEsta extends Model
{
    protected $fillable = [
        'id',
        's_estado',
        'i_estado',
        'user_crea_id',
        'user_edita_id',];

    protected $attributes = ['i_estado' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1];

    public static function combo($dataxxxx)
    {
        if($dataxxxx['cabecera']){
            if($dataxxxx['esajaxxx']){  
                $comboxxx[] = ['valuexxx'=>'','optionxx'=>'Seleccione'];
            }else{
                $comboxxx = [''=>'Seleccione'];
            }
            
        }   
        $entidadx=SisEsta::get();
        foreach ($entidadx as $entisalu) {
            if($dataxxxx['esajaxxx']){
                $comboxxx[] = ['valuexxx'=>$entisalu->id, 'optionxx'=>$entisalu->s_estado];
            }else{
                $comboxxx[$entisalu->id] = $entisalu->s_estado;
            }
        }
        return $comboxxx;
    }
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_crea_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }

    public static function transaccion($dataxxxx, $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = SisEsta::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
