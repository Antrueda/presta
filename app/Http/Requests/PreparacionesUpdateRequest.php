<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Formulacionmed;
use App\FormulacionmedMlote;
use App\Mlote;

class PreparacionesUpdateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

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

  private function validar() {
    $this->_mensaje = [
        'formvaci.regex' => 'Debe seleccionar todos los medicamentos',
    ];
    $this->_reglasx = [
        'formvaci' => 'regex:/^[1-9]$/i',
    ];
    $medicame = '';
    $respuest = false;
    foreach ($this->toArray() as $key => $value) {
      $dataxxxx = explode('_', $key);
      if ($dataxxxx[0] == 'preparar') { echo $dataxxxx[1].'<br>';
        $formedic = Formulacionmed::where('id', $dataxxxx[1])->first();
        $inventar = FormulacionmedMlote::where('formulacionmed_id', $formedic->id)->first();
        $mlotexxx = Mlote::consultarinventario($formedic, true);
        if (count($mlotexxx) == 0 && count($inventar) == 0) {
          $respuest = true;
          $medicame .= $formedic->medicamento->nombgene . ', ';
        }
      }
    }
    if ($respuest) {
      $this->_reglasx['validarx'] = 'required';
      $this->_mensaje['validarx.required'] = 'La preparación no se puede realizar porque los siguientes medicamentos: ' . $medicame . ' no tienen inventario suficiente';
    }
  }

}
