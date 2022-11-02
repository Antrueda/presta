<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Unidade
 *
 * @author Nowen21
 */
class HUnidade extends Model {

  protected $fillable = [
      'unidad',  'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];



}
