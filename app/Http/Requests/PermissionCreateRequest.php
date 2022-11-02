<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionCreateRequest extends FormRequest
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

     public function messages() {
    return [
        'name.required' => 'El nombre es requerido',
        'name.string' => 'El nombre debe ser un texto',
        'slug.required' => 'El permiso es requerido',
        'slug.string' => 'El permiso debe ser un texto',
        'slug.unique' => 'El permiso ya está creado',
        'description.required' => 'Describa de qué se trata el permiso', 
        'description.string' => 'La descripción del permiso debe ser un texto', 
        
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'name' => 'required|string',
        'slug' => 'required|string|unique:permissions',
        'description' => 'required|string',
    ];
  }
}
