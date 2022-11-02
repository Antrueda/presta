<?php

namespace App\Http\Requests\Pacientes;

use Illuminate\Foundation\Http\FormRequest;
class PacienteServicioCreateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'paciente_id.required' => 'Seleccione un paciente',
        'servicio_id.required' => 'Selecciones un servicio',
    ];
    $this->_reglasx = [
        'paciente_id' => ['required'],
        'servicio_id' => ['required']
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
