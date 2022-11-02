<?php

namespace App\Http\Requests\Administracion\Rango;

use App\Models\Administracion\Rango\Rcodigo;
use Illuminate\Foundation\Http\FormRequest;

class RcodigoCrearRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;
    public function __construct()
    {
        $this->_mensaje = [
            'rcondici_id.required' => 'Seleccione una condición',
            'codiprod.required' => 'Ingrese el código word office',
            'descripc.required' => 'Ingrese la descripción del rango',
        ];
        $this->_reglasx = [
            'rcondici_id' => ['required'],
            'codiprod' => ['required'],
            'descripc' => ['required'],
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
        $rangoxxx = Rcodigo::join('rcondicis', 'rcondicis.rnpt_id', '=', 'rcondicis.id')
            ->join('rnpts', 'rcondicis.rnpt_id', '=', 'rnpts.id')
            ->where('rnpts.rango_id', $this->segments()[1])
            ->where('rcodigos.codiprod', $this->codiprod)
            ->where('rcodigos.rcondici_id', $this->rcondici_id)
            ->first();

        if (isset($rangoxxx->id)) {
            $this->_mensaje['existexx.required'] = "El código y la condición ya están asociados";
            $this->_reglasx['existexx'] = 'required';
        }
    }
}
