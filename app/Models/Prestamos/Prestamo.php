<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'leidaxxx', 'routexxx', 'tipoaccion_id', 'cformula_id','sis_esta_id','user_crea_id','user_edita_id'
   ];

   public function clinica()
   {
       return $this->belongsTo(SisClinica::class);
   }

  

}
