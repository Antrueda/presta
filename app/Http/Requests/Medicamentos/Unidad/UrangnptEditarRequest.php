<?php

namespace App\Http\Requests\Medicamentos\Unidad;

use App\Models\Medicamentos\Unidad\Unidrang;
use Illuminate\Foundation\Http\FormRequest;

class UrangnptEditarRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {
        $this->_mensaje = [
            'unidrang_id.required' => 'Seleccione un rango',
            'npt_id.required' => 'Seleccione un NPT',

        ];
        $this->_reglasx = [

            'unidrang_id' => 'required',
            'npt_id' => 'required',
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
        $rangonpt = Unidrang::where('id', '!=', $this->segments()[2])->first();
        if (isset($rangonpt->id)) {
            $this->_mensaje['existexx.required'] = "El rango y el NPT ya se encuentran asociados";
            $this->_reglasx['existexx'] = 'required';
        }
    }
}
