<?php

namespace App\Http\Requests\Medicamentos\Unidad;

use Illuminate\Foundation\Http\FormRequest;

class UnidadEditarRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {
        $this->_mensaje = [
            's_unidad.required' => 'Ingrese la unidad',
            's_unidad.unique' => 'La unidad ya existe',
        ];
        $this->_reglasx = [
            's_unidad' => ['required'],
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
        $this->_reglasx['s_unidad'][1] = 'unique:unidads,s_unidad,' . $this->segments()[2];
        return $this->_reglasx;
    }

    public function validar()
    {
    }
}
