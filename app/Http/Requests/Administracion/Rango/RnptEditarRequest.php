<?php

namespace App\Http\Requests\Administracion\Rango;

use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rnpt;
use Illuminate\Foundation\Http\FormRequest;

class RnptEditarRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'npt_id.required' => 'Seleccione un enp',
    ];
    $this->_reglasx = [
      'npt_id' => ['required'],
    ];
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function messages()
  {
    return $this->_mensaje;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $this->validar();

    return $this->_reglasx;
  }

  public function validar()
  {
    $rangoold = Rnpt::where('rango_id', $this->segments()[1])
    ->where('npt_id', $this->npt_id)
      ->first();
    $rangonew = Rnpt::where('id', $this->segments()[4])->first();
    if (isset($rangonew->id)) {
      if ($rangoold->id != $rangonew->id) { 
        $this->_mensaje['nptidxxx.required'] = "El npt ya está en uso";
        $this->_reglasx['nptidxxx'] = 'required';
      }
    }
  }
}
