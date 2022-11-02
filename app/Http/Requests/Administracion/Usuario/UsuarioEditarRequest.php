<?php

namespace App\Http\Requests\Administracion\Usuario;

use App\Rules\QuimicoFamaceuticoRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioEditarRequest extends FormRequest
{

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
        return [
            'name.required' => 'El nombre del usuario es requerido',
            'email.required' => 'El E-mail es requerido',
            'email.unique' => 'El E-mail ya se encuentra en uso',
            'documento.required' => 'El documento es requerido',
            'documento.unique' => 'El documento ya se encuentra en uso',
            'sis_clinica_id.required' => 'La clínica es requerida',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'unique:users,email,' . $this->segments()[2]
            ],
            'documento' => [
                'required',
                'unique:users,documento,' . $this->segments()[2]
            ],
            'sis_clinica_id' => 'required',
        ];
    }
}
