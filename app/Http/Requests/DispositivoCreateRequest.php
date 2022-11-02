<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositivoCreateRequest extends FormRequest {

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
        'nombgene.required' => 'El nombre es requerido',
        'nombgene.string' => 'El nombre genérico debe ser un texto',
        'nombgene.unique' => 'El nombre genérico ya existe',
        'concentr.required' => 'Ingrese la concentración',
        'concentr.integer' => 'La concentración es numérica',
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
        'nombgene' => 'required|string|unique:dispmedicos',
        'concentr' => 'required|integer',
        'unidmedi' => 'required',  
    ];
  }

}
