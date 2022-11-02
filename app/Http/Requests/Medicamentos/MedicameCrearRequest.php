<?php

namespace App\Http\Requests\Medicamentos;

use Illuminate\Foundation\Http\FormRequest;

class MedicameCrearRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'nombgene.required' => 'El nombre es requerido',
        'nombgene.string' => 'El nombre genérico debe ser un texto',
        'nombgene.unique' => 'El nombre genérico ya existe',
        'concentr.required' => 'Ingrese la concentración',
        'unidmedi.required' => 'Ingrese la unidad de medida',
    ];
    $this->_reglasx = [

        'nombgene' => 'required|string|unique:medicames',
        'concentr' => 'required',
        'unidmedi' => 'required',
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
    // $dataxxxx = $this->toArray();
    // if (!isset($dataxxxx['npts'])) {
    //   $this->_mensaje['nptsxxxx.required'] = "Seleccione al menos un npt";
    //   $this->_reglasx['nptsxxxx'] = 'required';
    // }
    // if (!isset($dataxxxx['casas'])) {
    //   $this->_mensaje['casa_id.required'] = "Seleccione al menos una casa";
    //   $this->_reglasx['casa_id'] = 'required';
    // }
  }

}
