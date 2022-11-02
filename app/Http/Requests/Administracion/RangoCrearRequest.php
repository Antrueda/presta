<?php

namespace App\Http\Requests\Administracion;

use App\Models\Administracion\Rango;
use Illuminate\Foundation\Http\FormRequest;

class RangoCrearRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;
    public function __construct()
    {
        $this->_mensaje = [
            'ranginic.required' => 'Ingrese el rango inicial',
            'ranginic.numeric' => 'El rango incial debe ser numérico',
            'ranginic.min' => 'El valor mínimo para rango inicial debe ser uno',
            'ranginic.max' => 'El valor máximo para rango inicial debe estar entre 1 y 9999',
            'rangfina.required' => 'Ingrese el rango final',
            'rangfina.numeric' => 'El rango final debe ser numérico',
            'rangfina.min' => 'El valor mínimo para rango inicial debe ser uno',
            'rangfina.max' => 'El valor máximo para rango final debe estar entre el rango inicial y 9999',
        ];
        $this->_reglasx = [
            'ranginic' => ['required', 'numeric', 'min:1', 'max:9999'],
            'rangfina' => ['required', 'numeric', 'min:1', 'max:9999'],
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
        $rangoxxx = Rango::where('ranginic', $this->ranginic)
        ->where('rangfina', $this->rangfina)
        ->first();
        if (isset($rangoxxx->id)) {
            $this->_mensaje['rangoxxx.required'] = "El rango ya existe";
            $this->_reglasx['rangoxxx'] = 'required';
        }
        
        if ($this->ranginic >= $this->rangfina) {
            $this->_mensaje['rangoxxx.required'] = "El rango de finalicación debe ser mayor al de inicio";
            $this->_reglasx['rangoxxx'] = 'required';
        }
    }
}
