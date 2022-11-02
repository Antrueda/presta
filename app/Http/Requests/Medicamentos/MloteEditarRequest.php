<?php

namespace App\Http\Requests\Medicamentos;

use Illuminate\Foundation\Http\FormRequest;

class MloteEditarRequest extends FormRequest
{

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function messages()
  {
    return [
      'fechvenc.required' => 'Seleccione una fecha de vencimiento',
      'minvima_id.required' => 'Seleccione un registro invima',
      'inventar.required' => 'Ingrese la cantidad para el inventario del medicamento',
      'lotexxxx.required' => 'Ingrese el lote del medicamento',
      'lotexxxx.unique' => 'El lote ya existe',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'fechvenc' => 'required',
      'minvima_id' => 'required',
      'inventar' => 'required',
      'lotexxxx' => 'required|unique:mlotes,lotexxxx,' . $this->segments()[3],
    ];
  }
}
