<?php

namespace App\Models\Formulaciones;

use App\Models\Produccion\Calistam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Orden extends Model
{
  protected $fillable = [
    'ordeprod', 'observac', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];

  public static function getOrden()
  {
    $fechahoy = date('Y-m-d', time());
    $ordendia = Orden::where('created_at', 'like', "{$fechahoy}%")->first();
    if (!isset($ordendia->id)) {
      $fechahoy = explode('-', $fechahoy);
      $ordendia = Orden::create([
        'ordeprod' => $fechahoy[2] . $fechahoy[1] . substr($fechahoy[0], 2, 2),
        'sis_esta_id' => 1, 'user_crea_id' => Auth::user()->id, 'user_edita_id' => Auth::user()->id
      ]);
    }
    return $ordendia;
  }
  public static function ordendia()
  {
    $ordendia = Orden::getOrden();
    return [$ordendia->id => $ordendia->ordeprod];
  }


  public static function getOrdenDia()
  {
    $ordendia = Orden::getOrden();
    return $ordendia->id;
  }



  public function cformulas()
  {
    return $this->hasMany(Cformula::class);
  }
  public function calistams()
  {
    return $this->hasMany(Calistam::class);
  }
}
