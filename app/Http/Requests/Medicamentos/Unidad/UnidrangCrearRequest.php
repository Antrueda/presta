<?php

namespace App\Http\Requests\Medicamentos\Unidad;

use App\Models\Medicamentos\Unidad\Unidrang;
use Illuminate\Foundation\Http\FormRequest;

class UnidrangCrearRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {
        $this->_mensaje = [
            'unidad_id.required' => 'Seleccione una unidad',
            'rangonpt_id.required' => 'Seleccione un rango',

        ];
        $this->_reglasx = [

            'unidad_id' => 'required',
            'rangonpt_id' => 'required',
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
        $rangonpt = Unidrang::where('unidad_id', $this->unidad_id)->where('rangonpt_id', $this->rangonpt_id)->first();
        if (isset($rangonpt->id)) {
            $this->_mensaje['existexx.required'] = "El rango y la unidad ya se encuentran asociados";
            $this->_reglasx['existexx'] = 'required';
        }
    }
}
