<?php

namespace App\Http\Requests\Clinica;

use App\Models\Indicadores\InDocIndi;
use Illuminate\Foundation\Http\FormRequest;
class SisClinicaEditarRequest extends FormRequest
{

    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {

        $this->_mensaje = [
            'sucursal.required' => 'Ingrese el nombre de la sucursal',
            'municipio_id.required' => 'Seleccione un municipio',
            'sucursal.unique' => 'La sucursala ya se encuenta en uso',
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
            'municipio_id' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
            ],
            'sucursal' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
                'unique:sis_clinicas,sucursal,'. $this->segments()[2]
            ],
        ];
        return $this->_reglasx;
    }

    public function validar()
    {

    }
}
