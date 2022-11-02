<?php

namespace App\Http\Requests\Produccion;

use Illuminate\Foundation\Http\FormRequest;

class CalistamCrearRequest extends FormRequest
{
    private $_message;
    private $_rulesxx;
    public function __construct()
    {
        $this->_message = [
        ];
        $this->_rulesxx = [
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
        return $this->_message;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->getValidar();
        return $this->_rulesxx;
    }
    public function getValidar()
    {
        $lotexxxx = true;
        $loteyyyy = true;
        foreach ($this->request as $key => $value) {
            $textxxxx = strpos($key, 'xxxx');
            $textyyyy = strpos($key, 'yyyy');
            if ($textxxxx && $value > 0) {
                $lotexxxx = false;
            }
            if ($textyyyy && $value > 0) {
                $loteyyyy = false;
            }
        }

        if ($lotexxxx) {
            $this->_message['lotexxxx.required'] = 'Ingrese la cantidad almenos pora un medicamento';
            $this->_rulesxx['lotexxxx'] = ['required'];
        }
        if ($loteyyyy) {
            $this->_message['loteyyyy.required'] = 'Ingrese al menos la cantidad para un dispositivo médico';
            $this->_rulesxx['loteyyyy'] = ['required'];
        }
    }
}
