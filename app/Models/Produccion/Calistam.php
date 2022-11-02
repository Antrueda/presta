<?php

namespace App\Models\Produccion;

use App\Models\Dispositivos\Dlote;
use App\Models\Formulaciones\Orden;
use App\Models\Medicamentos\Mlote;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Calistam extends Model
{
    protected $fillable = [
        'producto',
        'orden_id',
        'sis_esta_id',
        'user_crea_id',
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
    public function sis_esta()
    {
        return $this->belongsTo(SisEsta::class);
    }
    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function dlotes()
    {
        return $this->morphedByMany(Dlote::class, 'calistamgable')->withTimestamps()->withPivot(['unidad','cantcons','diferenc']);
    }
    public function mlotes()
    {
        return $this->morphedByMany(Mlote::class, 'calistamgable')->withTimestamps()->withPivot(['unidad','cantcons','diferenc']);
    }
    //alistamiento, conciliacion, etiqueta, ordenes , control de proceso y producots terminado
    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx->request->add(['user_edita_id' => Auth::user()->id]);
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx->all());
            } else {
                $dataxxxx->request->add(['user_crea_id' => Auth::user()->id]);
                $objetoxx = Calistam::create($dataxxxx->all());
            }
            // Dalistam::transaccion($dataxxxx,  $cabecera);
            foreach ($dataxxxx->request as $key => $value) {
                $compleme = [
                    'sis_esta_id' => 1,
                    'user_crea_id' => Auth::user()->id,
                    'user_edita_id' => Auth::user()->id
                ];
                $textxxxx = strpos($key, 'xxxx');
                $textyyyy = strpos($key, 'yyyy');
                if ($textxxxx && $value > 0) {
                    $compleme['unidad'] = $value;
                    $objetoxx->mlotes()->attach([str_replace('idun_xxxx_', '', $key) => $compleme]);
                }
                if ($textyyyy && $value > 0) {
                    $compleme['unidad'] = $value;
                    $objetoxx->dlotes()->attach([(int)str_replace('idun_yyyy_', '', $key) => $compleme]);
                }
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
