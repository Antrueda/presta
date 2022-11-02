<?php

namespace App\Http\Requests\Dispositivos;

use Illuminate\Foundation\Http\FormRequest;

class DmarcaCrearRequest extends FormRequest {

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
        'reginvim.required' => 'El registro invima es requerido',
        'marcaxxx.required' => 'Ingrese la marca',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'reginvim' => 'required|unique:dmarcas', 
        'marcaxxx' => 'required',
    ];
  }

}
