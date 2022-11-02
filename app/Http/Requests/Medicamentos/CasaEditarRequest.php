<?php

namespace App\Http\Requests\Medicamentos;

use Illuminate\Foundation\Http\FormRequest;

class CasaEditarRequest extends FormRequest {

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
        'casa.required' => 'El nombre de la casa es requerido',
        'casa.string' => 'El nombre debe ser un texto',
        'casa.unique' => 'El la casa ya existe',
        'nameidxx.required' => 'El id del campo es requerido',        
        'nameidxx.unique' => 'El id del campo ya existe',         
        'nameidxx.alpha' => 'El id del campo debe ser texto',
        'unidmedi.required' => 'Ingrese la unidad de medida',  
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'casa' => 'required|string|unique:casas,casa,'. $this->segments()[2],
        'nameidxx' => 'required|alpha|unique:casas,nameidxx,'. $this->segments()[2],
        'unidmedi'=>['required']
    ];
  }

}
