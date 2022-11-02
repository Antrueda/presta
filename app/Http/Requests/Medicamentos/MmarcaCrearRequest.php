<?php

namespace App\Http\Requests\Medicamentos;

use App\Models\Medicamentos\Mmarca;
use Illuminate\Foundation\Http\FormRequest;

class MmarcaCrearRequest extends FormRequest
{
    private $messagex;
    private $reglasxx;
    public function __construct()
    {
        $this->messagex = [
            'nombcome.required' => 'El nombre comercial es requerido',
            'osmorali.required' => 'Ingrese la osmoralidad',
            'osmorali.integer' => 'La osmoralidad es numérica',
            'nombcome.regex' => 'Los caracteres del nombre comercial no son correctos',
            'pesoespe.required' => 'El peso específico es requerido',
            'formfarm.required' => 'La forma farmaceútica es requerida',
            'marcaxxx.required' => 'Ingrese la marca',
        ];

        $this->reglasxx = [
            'nombcome' => [
                'required',
                'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\/ ()%0-9-,Ω.\s]+$/',

            ],
            'osmorali' => 'required',
            'pesoespe' => 'required',
            'formfarm' => 'required',
            'marcaxxx' => 'required',

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
        return  $this->messagex;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $marcaxxx = Mmarca::where('nombcome', $this->nombcome)->where('marcaxxx', $this->marcaxxx)->first();
        if (isset($marcaxxx->id)) {
            $this->reglasxx['nombcome'][0] = 'unique:mmarcas,nombcome,' . $this->segments()[3];
            $this->messagex['nombcome.unique'] = "La marca: {$this->marcaxxx} y el nombre comercial: {$this->nombcome} ya se encuentran asociados";
        }
        return $this->reglasxx;
    }
}
