<?php

namespace App\Models\Produccion;

use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProPreplibe extends Model
{
    protected $fillable = [
        'userprep_id',
        'userevis_id',
        'sis_esta_id',
        'user_crea_id',
        'user_edita_id',

    ];


    public function userprep()
    {
       return $this->BelongsTo(User::class,'userprep_id');
    }
    public function userevis()
    {
       return $this->BelongsTo(User::class,'userevis_id');
    }
    public function user_crea()
    {
       return $this->BelongsTo(User::class,'user_crea_id');
    }
    public function user_edita()
    {
       return $this->BelongsTo(User::class,'user_edita_id');
    }
    public function sis_esta()
    {
       return $this->BelongsTo(SisEsta::class);
    }







    public static function transaccion($dataxxxx)
    {
        $respuest = DB::transaction(function () use ($dataxxxx) {
            $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::id()]);
            if ($dataxxxx['objetoxx'] != '') {
                $dataxxxx['objetoxx']->update($dataxxxx['requestx']->all());
            } else {
                $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::id()]);
                $dataxxxx['objetoxx'] = ProPreplibe::create($dataxxxx['requestx']->all());
            }
            return $dataxxxx['objetoxx'];
        }, 5);
        return redirect()
            ->route($dataxxxx['routxxxx']  . '.editarxx', [$respuest->id])
            ->with('info', $dataxxxx['infoxxxx']);
    }
}
