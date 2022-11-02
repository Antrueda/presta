<?php

namespace App\Http\Requests\Dispositivos;

use Illuminate\Foundation\Http\FormRequest;

class DmedicoCrearRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'nombrexx.required' => 'El nombre es requerido',
        'nombrexx.string' => 'El nombre genérico debe ser un texto',
        'nombrexx.unique' => 'El nombre genérico ya existe',
    ];
    $this->_reglasx = [
        
        'nombrexx' => 'required|string|unique:dmedicos',
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
