<?php

namespace App\Http\Requests\Clinica;

use Illuminate\Foundation\Http\FormRequest;

class RemisionEditarRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'orden_id.required' => 'Selecciones una orden',
      ];
      $this->_reglasx = [
        'orden_id' => ['required']
      ];

  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
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

  public function validar() {

  }
}
