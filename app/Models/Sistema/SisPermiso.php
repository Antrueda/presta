<?php

namespace App\Models\Sistema;

use App\User;
use Spatie\Permission\Models\Permission;

class SisPermiso extends Permission
{
    protected $fillable = ['sis_esta_id', 'name', 'guard_name','descripc'];
    protected $attributes = ['sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1];
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_crea_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }
}
