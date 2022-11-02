<?php

namespace App\Http\Requests\Medicamentos\Unidad;

use App\Models\Medicamentos\Unidad\Rangonpt;
use Illuminate\Foundation\Http\FormRequest;

class RangonptEditarRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;

    public function __construct()
    {
        $this->_mensaje = [
            'randesde.required' => 'El inicio del rango es requerido',
            'ranhasta.required' => 'El final del rango es requerido',

        ];
        $this->_reglasx = [

            'randesde' => 'required',
            'ranhasta' => 'required',
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
        $rangonpt = Rangonpt::where('randesde',  $this->randesde)
            ->where('ranhasta',  $this->ranhasta)
            ->whereNotIn('id', [$this->segments()[2]])
            ->first();

        if (isset($rangonpt->id)) {
            $this->_mensaje['rangoxxx.required'] = "El rango ya existe";
            $this->_reglasx['rangoxxx'] = 'required';
        }
    }
}
