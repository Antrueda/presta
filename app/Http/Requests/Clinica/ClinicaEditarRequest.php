<?php

namespace App\Http\Requests\Clinica;


use Illuminate\Foundation\Http\FormRequest;
class ClinicaEditarRequest extends FormRequest
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

        $this->_reglasx = [
            'telefono' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
            ],
            'nitxxxxx' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
                'unique:clinicas,nitxxxxx,'. $this->segments()[2]
            ],
            'clinica' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
                'unique:clinicas,clinica,'. $this->segments()[2]
            ],
        ];
        return $this->_reglasx;
    }

    public function validar()
    {

    }
}
