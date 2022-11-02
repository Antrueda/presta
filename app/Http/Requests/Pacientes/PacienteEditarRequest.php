<?php

namespace App\Http\Requests\Pacientes;

use App\Models\Pacientes\Paciente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PacienteEditarRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'registro.required' => 'Seleccines una fecha para el registro del paciente',
      'cedula.unique' => 'El número de documento  ya existe para la clínica',
      'nombres.required' => 'Ingrese el nombre',
      'npt_id.required' => 'Seleccione un NPT',
      'peso.required' => 'Ingreso el peso',
      'genero_id.required' => 'Seleccione un género',
      'ep_id.required' => 'Seleccione una eps',
      'servicio_id.required' => 'Seleccione un servicio',
      'cama.required' => 'Ingrese el número de cama',
      'fechnaci.required' => 'Seleccione la fecha de naciemiento del paciente',
      'departamento_id.required' => 'Seleccione un departamento',
      'municipio_id.required' => 'Seleccione un municipio',
    ];
    $this->_reglasx = [
      'registro' => 'required',
      'nombres' => 'required',
      'npt_id' => 'required',
      'peso' => 'required',
      'genero_id' => 'required',
      'servicio_id' => 'required',
      'ep_id' => 'required',
      'cama' => 'required',
      'fechnaci' => 'required',
      'departamento_id' => 'required',
      'municipio_id' => 'required',
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
    $this->_mensaje['cedula.required'] = 'Ingrese el número de documento';
    $this->_reglasx['cedula'][0] = 'required';

    return $this->_reglasx;
  }

  public function validar()
  {
    // $otroregi = Paciente::whereNotIn('sis_clinica_id', [$this->sis_clinica_id])->where('cedula', $this->cedula)->first();
    // ddd($otroregi);
    // if (isset($otroregi->id)) {
    //     $this->_reglasx['cedula'][1] = 'unique:pacientes,cedula,' . $this->segments()[2];
    // }
  }
}
