<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RemisioneUpdateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'clinica_id.required' => 'Seleccione una clínica',
        'clinica_rango_id.required' => 'Selecciones un rango',
    ];
    $this->_reglasx = [
        'clinica_id' => ['required'],
        'clinica_rango_id' => ['required']
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
    $dataxxxx = $this->toArray();
  }

}
