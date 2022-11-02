<?php

namespace App\Http\Requests\Reportes\Excelxxx;

use App\Rules\FechastaRule;
use Illuminate\Foundation\Http\FormRequest;

class InformeClinicaCreateRequest extends FormRequest {

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
        'fechdesd.required' => 'Seleccione la fecha desde',
        'fechasta.required' => 'Seleccione la fecha hasta',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'fechdesd' => ['required'],
        'fechasta' => ['required',new FechastaRule($this->fechdesd, $this->fechasta)],
    ];
  }

}
