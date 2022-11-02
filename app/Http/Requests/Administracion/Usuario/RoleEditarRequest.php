<?php

namespace App\Http\Requests\Administracion\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class RoleEditarRequest extends FormRequest
{

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
    return [
      'name.required' => 'Ingrese el nombre del rol',
      'name.unique' => 'El rol ya existe',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => ['required',
      'unique:roles,name,'.$this->segments()[2]
    ],
];
  }
}
