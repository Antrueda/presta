<?php

namespace App\Http\Requests\Clinica;

use App\Models\Clinica\Crango;
use Illuminate\Foundation\Http\FormRequest;

class CrangoEditarRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'rcodigo_id.required' => 'Selecciones un rango',
    ];
    $this->_reglasx = [
        'rcodigo_id' => ['required'],
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
    $rangoxxx=Crango::where('sis_clinica_id',$this->segments()[1])->where('rcodigo_id',$this->rcodigo_id)->first();
    $rangoyxx=Crango::where('sis_clinica_id',$this->segments()[1])->first();
    if(isset($rangoxxx->id) && isset($rangoyxx->id)){      
      $this->_mensaje['existexx.required']='El rango ya está asociado a la clínica';
      $this->_reglasx['existexx']=['required'];
    }
  }
}
