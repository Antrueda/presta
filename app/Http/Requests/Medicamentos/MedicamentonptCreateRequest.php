<?php

namespace App\Http\Requests\Medicamentos;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentonptCreateRequest extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  public function messages() {
    return [
        'npt_id.required' => 'Seleccione un npt',
        'medicamento_id.required' => 'Seleccione un medicamento',
        'randesde.required' => 'Ingrese donde inicia el rango',
        'ranhasta.required' => 'Ingrese donde termina el rango',
        'rangunid.required' => 'Ingrese la unidad para el rango',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'npt_id' => 'required',
        'medicamento_id' => 'required',
        'randesde' => 'required',
        'ranhasta' => 'required',
        'rangunid' => 'required',
    ];
  }

}
