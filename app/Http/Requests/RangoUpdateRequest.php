<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rango;

class RangoUpdateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'ranginic.required' => 'Ingrese el rango inicial',
        'rangfina.required' => 'Ingrese el rango final',
    ];
    $this->_reglasx = [
        'ranginic' => ['required'],
        'rangfina' => ['required']
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
    $rangoold = Rango::find($this->segments()[1]);
    $rangonew = Rango::where('ranginic', $dataxxxx['ranginic'])->where('rangfina', $dataxxxx['rangfina'])->first();
    if (count($rangonew)>0) {
      if ($rangoold->id != $rangonew->id) {
        $this->_mensaje['rangoxxx.required'] = "El rango ya existe";
        $this->_reglasx['rangoxxx'] = 'required';
      }
    }
  }

}
