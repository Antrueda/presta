<?php

namespace App\Http\Requests\Produccion;

use Illuminate\Foundation\Http\FormRequest;

class PreparacionEditarRequest extends FormRequest {

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
        // 'producto.required' => 'El producto es requerido',
        // 'formvaci.regex' => 'Ingrese al menos una cantidad alistada para un medicamento o dispositivo médico',

    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        //'producto' => 'required',

    ];
  }

}
