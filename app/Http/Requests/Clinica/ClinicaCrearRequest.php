<?php

namespace App\Http\Requests\Clinica;

use Illuminate\Foundation\Http\FormRequest;

class ClinicaCrearRequest extends FormRequest
{

    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {

        $this->_mensaje = [
            'telefono.required' => 'Ingrese el número de teléfono',
            'nitxxxxx.required' => 'Ingrese el nit',
            'nitxxxxx.unique' => 'el nit ya se encuentra en uso',
            'clinica.required' => 'Ingrese el nombre de la clínica',
            'clinica.unique' => 'El nombre de la clínica ya se encuentra en uso',
        ];
        $this->_reglasx = [
            'telefono' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
            ],
            'nitxxxxx' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
                'unique:clinicas,nitxxxxx,'
            ],
            'clinica' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
                'unique:clinicas,clinica,'
            ],
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



    }
}
