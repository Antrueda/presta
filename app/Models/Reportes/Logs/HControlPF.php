<?php

namespace App\Models\Reportes\Logs;


use Illuminate\Database\Eloquent\Model;


class HControlPF extends Model {

  protected $fillable = [
      'registro',
      'cedula',
      'nombres',
      'apellidos',
      'peso',
      'genero_id',
      'ep_id',
      'cama',
      'fechnaci',
      'municipio_id',
      'npt_id',
      'servicio_id',
      'sis_clinica_id',
      'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];


}
