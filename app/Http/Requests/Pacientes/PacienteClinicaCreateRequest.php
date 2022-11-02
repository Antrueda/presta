<?php

namespace App\Http\Requests\Pacientes;

use Illuminate\Foundation\Http\FormRequest;

class PacienteClinicaCreateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [];
    $this->_reglasx = [];
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
  
    if (!isset($dataxxxx['clinicas'])) {
      $this->_mensaje['clinicax.required'] = "Debe seleccionar al menos una clínica";
      $this->_reglasx['clinicax'] = 'required';
    }
  }

}
