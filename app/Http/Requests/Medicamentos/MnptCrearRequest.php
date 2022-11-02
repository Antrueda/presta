<?php

namespace App\Http\Requests\Medicamentos;

use App\Models\Medicamentos\Mnpt;
use Illuminate\Foundation\Http\FormRequest;

class MnptCrearRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'urangnpt_id.required' => 'Seleccione un rango',

    ];
    $this->_reglasx = [
      'urangnpt_id' => 'required',
    ];
  }
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
    return $this->_mensaje;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $this->validar();
    return $this->_reglasx;
  }
  public function validar()
  {
    $mnptxxx = Mnpt::where("urangnpt_id", $this->urangnpt_id)->where("medicame_id", $this->segments()[1])->first();
    if (isset($mnptxxx->id)) {
      $this->_mensaje['existexx.required'] = "Este rango ya existe";
      $this->_reglasx['existexx'] = 'required';
    }
  }
}
