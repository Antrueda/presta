<?php

namespace App\Models\Sistema\Logs;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HSisEsta extends Model
{
    protected $fillable = [
        'id',
        's_estado',
        'i_estado',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',];

    protected $attributes = ['i_estado' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1];


}
