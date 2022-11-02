<?php

namespace App\Http\Requests\Administracion;

use App\Models\Administracion\Servicio;
use Illuminate\Foundation\Http\FormRequest;

class ServicioEditarRequest extends FormRequest
{
  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {

    $this->_mensaje = [
      'servicio.required' => 'Ingrese el nombre del servicio',
      'servicio.unique' => 'El servicio ya existe',
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
    $this->_reglasx = [
      'servicio' =>
      [
        'unique:servicios,servicio,'.$this->segments()[2],
        'required',
        'string' //y todos las validaciones a que haya lugar separadas por coma
      ],

    ];
  }
}
