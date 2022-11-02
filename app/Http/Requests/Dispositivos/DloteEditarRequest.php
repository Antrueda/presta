<?php

namespace App\Http\Requests\Dispositivos;

use Illuminate\Foundation\Http\FormRequest;

class DloteEditarRequest extends FormRequest
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
      'dmarca_id.required'=> 'Seleccione una marca',
      'fechvenc.required' => 'Seleccione una fecha de vencimiento',
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
      'inventar' => 'required',
      'dmarca_id' => 'required',
      'lotexxxx' => 'required|unique:mlotes,lotexxxx,' . $this->segments()[3],
    ];
  }
}
