<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DmarcaCreateRequest extends FormRequest {

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
        'nombcome.required' => 'El nombre comercial es requerido',
        'nombcome.unique' => 'El nombre comercial ya existe',
        'nombcome.regex' => 'Los caracteres del nombre comercial no son correctos',
        'nombcome.string' => 'El nombre debe ser un texto',
        'osmorali.required' => 'Ingrese la osmolaridad',
        'osmorali.integer' => 'La osmolaridad es numérica',
        'pesoespe.required' => 'El peso específico es requerido',
        'formfarm.required' => 'La forma farmaceútica es requerida',
        'dispmedico_id.required' => 'Seleccione un dispositivo médico',
        'marcaxxx.required' => 'Ingrese una marca',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'nombcome' => 'required||string|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\/ ()%0-9-,Ω.\s]+$/|unique:dmarcas',
        'osmorali' => 'required',
        'pesoespe' => 'required',
        'formfarm' => 'required',
        'dispmedico_id' => 'required',
        'marcaxxx' => 'required',
    ];
  }

}
