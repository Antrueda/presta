<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequesModeloCrearRequest extends FormRequest
{

    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {

        $this->_mensaje = [
            'name.required' => 'Ingrese el nombre del rol',
            'name.unique' => 'el rol ya se encuentra en uso',
        ];
        $this->_reglasx = [
            'name' =>
            [
                'required', //y todos las validaciones a que haya lugar separadas por coma
                'unique:roles,name,'
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
        $dataxxxx = $this->toArray(); // todo lo que se envia del formulario
        // unico para relacion multiple
        $docuindi = InDocIndi::where('in_indicador_id', $dataxxxx['in_indicador_id'])
            ->where('sis_documento_fuente_id', $dataxxxx['sis_documento_fuente_id'])->first();
        if (isset($docuindi->id)) {
            $this->_mensaje['asociacion.required'] = 'la asociacion del indicador y el docuemnto fuente ya existe';
            $this->_reglasx['asociacion'] = 'required';
        }

        if (!isset($dataxxxx['permissions'])) {
            $this->_mensaje['permissions.required'] = 'Seleccione al menos un permios';
            $this->_reglasx['permissions'] = 'required';
        }
    }
}
