<?php

namespace App\Http\Requests\Administracion\Usuario;

use App\Rules\QuimicoFamaceuticoRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioCrearRequest extends FormRequest {

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
        'name.required' => 'El nombre del usuario es requerido',
        'email.required' => 'El E-mail es requerido',
        'email.unique' => 'El E-mail ya se encuentra en uso',
        'documento.required' => 'El documento es requerido',
        'documento.unique'=>'El documento ya se encuentra en uso',
        'password.required' => 'El password debe ser obligatorio',
        'password.min' => 'El password mínimo debe ser de 6 caracteres',
        'sis_clinica_id.required' => 'La Clínica es requerida',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'documento' => 'required|unique:users',
        'password' => 'required|string|min:6',
        'sis_clinica_id' => 'required',
    ];
  }

}
