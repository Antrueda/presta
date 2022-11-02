<?php

namespace App\Http\Requests\Administracion\Rango;

use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rcondici;
use App\Models\Administracion\Rango\Rnpt;
use Illuminate\Foundation\Http\FormRequest;

class RcondiciEditarRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'rnpt_id.required' => 'Seleccione un npt',
      'condicio_id.required' => 'Seleccione una condición',
    ];
    $this->_reglasx = [
      'rnpt_id' => ['required'],
      'condicio_id' => ['required'],
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
    $rangoold = Rcondici::
    join('rnpts','rcondicis.rnpt_id','=','rnpts.id')
    ->where('rnpts.rango_id', $this->segments()[1])
    ->where('rcondicis.rnpt_id', $this->rnpt_id)
    ->where('rcondicis.condicio_id', $this->condicio_id)
    
    ->first();
    $rangonew = Rcondici::where('id', $this->segments()[4])->first();
    if (isset($rangonew->id) && isset($rangoold->id)) {

      if ($rangoold->id != $rangonew->id) { 
        $this->_mensaje['nptidxxx.required'] = "El npt y la condición ya estan asociados";
        $this->_reglasx['nptidxxx'] = 'required';
      }
    }
  }
}
