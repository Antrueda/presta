<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Logs;
use Illuminate\Database\Eloquent\Model;
/**
 * Contien toda la estructura de como se debe pintar la formulacion
 *
 * @author Nowen21
 */
class HMedipin extends Model {

  protected $fillable = [
      'casa_id',
      'casa',
      'ordeneon',
      'campo_id',
      'listneon',
      'ordepedi',
      'listpedi',
      'ordeadul',
      'listadul',
      'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
    ];

}
