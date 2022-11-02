<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * Contien toda la estructura de como se debe pintar la formulacion
 *
 * @author Nowen21
 */
class Medipin extends Model {

  protected $fillable = [
      'casa_id',
      'casa',
      'ordeneon',
      'campo_id',
      'listneon',
      'ordepedi',
      'listpedi',
      'ordeadul',
      'listadul'];

}
