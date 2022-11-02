<?php

namespace App\Http\Requests\Dispositivos;

use App\Models\Formulaciones\Dformula;
use App\Models\Medicamentos\Medicame;
use Illuminate\Foundation\Http\FormRequest;

class DmedicoEditarRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'nombrexx.required' => 'El nombre es requerido',
        'nombrexx.string' => 'El nombre genérico debe ser un texto',
        'nombrexx.unique' => 'El nombre genérico ya existe',
    ];
    $this->_reglasx = [
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
    $this->_mensaje['nombrexx.required'] = 'El nombre es requerido';
    $this->_reglasx['nombrexx'] = 'required|string|unique:dmedicos,nombrexx,' . $this->segments()[2];
    return $this->_reglasx;
  }

  public function validar() {
    
  }

}
