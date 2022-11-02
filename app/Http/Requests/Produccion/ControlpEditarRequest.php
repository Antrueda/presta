<?php

namespace App\Http\Requests\Produccion;

use Illuminate\Foundation\Http\FormRequest;

class ControlpEditarRequest extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  private $_mensaje;
  private $_reglasx;
  public function __construct()
  {
    $this->_mensaje = [
      'cformula_id.required' => 'Seleccione un lote',
      'coloraci.required' => 'Indique Coloración Normal',
      'ausepart.required' => 'Indique Ausencia de Partículas',
      'ausefuga.required' => 'Indique Ausencia de Fugas',
      'ausemise.required' => 'Indique Ausencia de Miscelas/Integridad en Emulsión',
  ];
  $this->_reglasx = [
    'cformula_id' => 'required',
    'coloraci' => 'required',
    'ausepart' => 'required',
    'ausefuga' => 'required',
    'ausemise' => 'required',
  ];
}


  public function authorize() {
    return true;
  }

  public function messages() {
    return $this->_mensaje;

     }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {

    $this->validar();

    return $this->_reglasx;
  }

  public function validar()
  {

    if($this->coloraci==2||$this->ausepart==2||$this->ausefuga==2||$this->ausemise==2){
          $this->_reglasx['permitir']='required';
          $this->_mensaje['permitir.required'] = 'Ningun campo debe estar en NO';
      }
  }

}
