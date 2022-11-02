<?php

namespace App\Http\Controllers\Clinicas;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Cformula\GrabarFormulacion;
use App\Helpers\Cformula\Validacionesajax;
use App\Http\Controllers\Controller;
use App\Http\Requests\Formulaciones\CformulaCrearRequest;
use App\Http\Requests\Formulaciones\CformulaEditarRequest;
use App\Models\Clinica\SisClinica;
use App\Models\Formulaciones\Cformula;
use App\Models\Pacientes\Paciente;
use App\Models\Sistema\SisEsta;
use App\Traits\Cformula\CalculosAjaxTrait;
use App\Traits\ClinicaTrait;
use App\Traits\Formulacion\FormulacionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CformulaController extends Controller
{
    use ClinicaTrait;
    use FormulacionTrait;
    use CalculosAjaxTrait;
    private $opciones;
    private $dataform;
    public function __construct()
    {
        $this->dataform = new Dataformulario();
        $this->opciones['pestpadr'] = 4;
        $this->opciones['parapest'] = [0, 0, 0, 0]; // paramentros para las pestañas
        $this->opciones['permisox'] = 'formular';
        $this->opciones['routxxxx'] = 'formular';
        $this->opciones['rutacarp'] = 'Clinicas.';
        $this->opciones['carpetax'] = 'Cformula';
        $this->opciones['slotxxxx'] =  $this->opciones['permisox'];
        $this->opciones['slotxxxy'] = 'paciente';
        $this->opciones['tabsxxxx'] = 'Clinicas.tabsxxxx.paciente.header';
        $this->opciones['tituloxx'] = 'PACIENTE';
        $this->opciones['fechcrea'] = '';
        $this->opciones['fechedit'] = '';
        $this->opciones['usercrea'] = '';
        $this->opciones['useredit'] = '';
        $this->opciones['cardheap'] = 'SUCURSAL: ';
        $this->opciones['cardhead'] = 'CLINICA: ';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A FORMULACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paciente $padrexxx)
    {
        $clinicax = $padrexxx->sis_clinica;
        $this->opciones['cardheap'] = 'SUCURSAL: ' . $clinicax->sucursal;
        $this->opciones['cardhead'] = 'CLINICA: ' . $clinicax->sucursal;
        $this->opciones['botoform'][0]['routingx'][1] = [$padrexxx->id];
        $this->opciones['paciente'] = $padrexxx;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['parapest'][0] = $padrexxx->sis_clinica_id;
        $this->opciones['parapest'][1] = $padrexxx->id;
        $this->opciones['parametr'] = [$padrexxx->id];
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA FORMULACIÓN',
                'titulist' => 'LISTA DE FORMULACIONES',
                'dataxxxx' => [],
                'vercrear' => $padrexxx->sis_esta_id == 1 ? true : false,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', [$padrexxx->id]),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'TIEMPO INFUSIÓN', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'VELOCIDAD INFUSIÓN', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'VOLUMEN', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'PURGA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'PESO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'TOTAL', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'FECHA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'tiempo', 'name' => 'cformulas.tiempo'],
                    ['data' => 'velocidad', 'name' => 'cformulas.velocidad'],
                    ['data' => 'volumen', 'name' => 'cformulas.volumen'],
                    ['data' => 'purga', 'name' => 'cformulas.purga'],
                    ['data' => 'peso', 'name' => 'cformulas.peso'],
                    ['data' => 'total', 'name' => 'cformulas.total'],
                    ['data' => 'created_at', 'name' => 'cformulas.created_at'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaformulaciones',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [$padrexxx->id],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request, Paciente $padrexxx)
    {
        if ($request->ajax()) {
            $request->padrexxx = $padrexxx;
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getPacientesCformula($request);
        }
    }
    public function getDataxxxxCFT()
    {
        return [

            'volutota' => 0, //volumen total

            'veloinfu' => 0,  //velocidad de infusion

            'pesoxxxx' => 0, //velocidad de infusion

            'velopurg' => 0,  //velocidad de infusion

            'carbvali' => 0,

            'concprov' => 0,

            'conclipv' => 0,

            'osmolari' => 0,  //OSMOLARIDAD (mOsm / L)

            'osmolarv' => 0,

            'calcfosv' => 0,

            'calototv' => 0,

            'calocarv' => 0,

            'calolipv' => 0,

            'caloprov' => 0,

            'pesoteor' => 0,  //PESO TEORICO  (GRAMOS)

            'concarbo' => 0,

            'concprot' => 0,

            'conclipi' => 0,

            'gramtota' => 0,

            'protnitr' => 0,

            'proteica' => 0,

            'caloprot' => 0,

            'calolipi' => 0,

            'calocarb' => 0,

            'calotota' => 0,

            'caltotkg' => 0,

            'calcfosf' => 0

        ];
    }
    private function view($dataxxxx)
    {
        $this->opciones['paciente'] = $dataxxxx['padrexxx'];
        $this->opciones['parapest'][0] = $this->opciones['paciente']->sis_clinica_id;
        $this->opciones['parapest'][1] = $this->opciones['paciente']->id;
        $this->opciones['parametr'] = [$this->opciones['paciente']->id];
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['cardhead'] = $this->opciones['cardhead'] . $this->opciones['paciente']->sis_clinica->clinica->clinica;
        $this->opciones['cardheap'] = 'SUCURSAL: ' . $dataxxxx['padrexxx']->sis_clinica->sucursal;
        $this->opciones['tituloxx'] = $this->opciones['tituloxx'] . ' ' . $this->opciones['paciente']->nombres . ' ' . $this->opciones['paciente']->apellidos;

        $this->opciones['clinicax'] = [$dataxxxx['padrexxx']->sis_clinica_id => $dataxxxx['padrexxx']->sis_clinica->sucursal];
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        $this->opciones['calculos'] = $this->getDataxxxxCFT();
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['calculos'] = $this->getArmarDataObjeto($dataxxxx['modeloxx']);

            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            if (auth()->user()->can($this->opciones['permisox'] . '-crear')) {
                if ($dataxxxx['padrexxx']->sis_esta_id == 1) {
                    $this->opciones['botoform'][] =
                        [
                            'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', [$dataxxxx['padrexxx']->id]],
                            'formhref' => 2, 'tituloxx' => 'IR A CREAR NUEVO REGISTRO', 'clasexxx' => 'btn btn-sm btn-primary'
                        ];
                }
            }

            $this->opciones['fechcrea'] = $dataxxxx['modeloxx']->created_at;
            $this->opciones['fechedit'] = $dataxxxx['modeloxx']->updated_at;
            $this->opciones['usercrea'] = $dataxxxx['modeloxx']->creador->name;
            $this->opciones['useredit'] = $dataxxxx['modeloxx']->editor->name;
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
        }

        // Se arma el titulo de acuerdo al array opciones
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Paciente $padrexxx)
    {
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $padrexxx,
                'furmulac' => '',
            ]
        );

        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 3, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary guardarx'
            ];
        return $this->view(['accionxx' => 'Crear', 'modeloxx' => '', 'padrexxx' => $padrexxx]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($paciente, CformulaCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['desdexxx'] = 10;
        $dataxxxx['paciente_id'] = $paciente;
        $dataxxxx['sis_clinica_id'] = Auth::user()->sis_clinica_id;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cformula $objetoxx)
    {
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $objetoxx->paciente,
                'furmulac' => $objetoxx,
            ]
        );
        return $this->view(['accionxx' => 'Ver', 'modeloxx' => $objetoxx, 'padrexxx' => $objetoxx->paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cformula $objetoxx)
    {

        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $objetoxx->paciente,
                'furmulac' => $objetoxx,

            ]
        );

        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$objetoxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['accionxx' => 'Editar', 'modeloxx' => $objetoxx, 'padrexxx' => $objetoxx->paciente]);
    }
    public function copy(Cformula $objetoxx)
    {
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $objetoxx->paciente,
                'furmulac' => $objetoxx,

            ]
        );

        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.copiar', [$objetoxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['accionxx' => 'Editar', 'modeloxx' => $objetoxx, 'padrexxx' => $objetoxx->paciente]);
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $quitcoma = [
            'concarbo',
            'concprot',
            'conclipi',
            'osmolari',
            'gramtota',
            'protnitr',
            'proteica',
            'caloprov',
            'caloprot',
            'calolipv',
            'calolipi',
            'calocarv',
            'calocarb',
            'calototv',
            'calotota',
            'caltotkg',
            'calcfosf',
            'pesoteor',
        ];
        foreach ($dataxxxx as $key => $value) {
            if (in_array($key,$quitcoma)) {
                $dataxxxx[$key]=str_replace(',','.',str_replace('.','',$dataxxxx[$key]));
            }
        }
        $cformula = Cformula::transaccion($dataxxxx, $objectx);
        $dataxxxx['cformula'] = $cformula;
        GrabarFormulacion::setDformula($dataxxxx);
        $redirect = '.ver';
        if (auth()->user()->can($this->opciones['routxxxx'] . '-editar')) {
            $redirect = '.editar';
        }
        return redirect()
            ->route($this->opciones['routxxxx'] . $redirect, [$cformula->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CformulaEditarRequest  $request, Cformula $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }
    public function copyu(CformulaCrearRequest  $request, Cformula $objetoxx)
    {
        $objetoxx->crango_id = null;
        $objetoxx->userevis_id = null;
        $objetoxx->userprep_id = null;
        $objetoxx->proceso_id = null;
        $objetoxx->terminado_id = null;
        $objetoxx->orden_id = null;
        $dataxxxx = $request->all();
        $dataxxxx['desdexxx'] = 10;
        $dataxxxx['paciente_id'] = $objetoxx->paciente_id;
        $dataxxxx['sis_clinica_id'] = Auth::user()->sis_clinica_id;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($clinicax, $padrexxx, Cformula $objetoxx)
    {
        $this->opciones['cardhead'] = $this->opciones['cardhead'] . SisClinica::where('id', $clinicax)->first()->clinica;
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }

    public function getFormular(Request $request)
    {
        if ($request->ajax()) {
            $campo_id = explode('_', $request->campo_id);
            $respuest['cantvolu'] = ($campo_id[1] == 'cant') ?
                [$campo_id[0] . '_volu', ''] : // si se digitó requerimiento diario
                [$campo_id[0] . '_cant', '']; // si se digito volumen
            $dataxxxx = [
                'formulax' => [
                    'cantvolu' => $respuest['cantvolu'],
                    'unidadxx' => [$campo_id[0] . '_cant', ''],
                    'menssage' => [$campo_id[0] . '_cant', 'hide', '']
                ], 'finalxxx' => []
            ];
            $formulax = $request->all();
            $respuesx=$this->getCalculosFomula($formulax);
            $dataxxxx['formulax'] =  $respuesx[0];
            // $dataxxxx['formulax'] = Validacionesajax::formulaciones($formulax);
            foreach ($formulax['dataxxxx'] as $key => $value) {
                if ($value['name'] == 'aguaeste_cant') {
                    $formulax['dataxxxx'][$key]['value'] = 1;
                }
                if ($value['name'] == 'aguaeste_volu') {
                    $formulax['dataxxxx'][$key]['value'] = str_replace(',', '', $dataxxxx['formulax']['aguaxxxx']);
                }
            }

            $dataxxxx['finalxxx'] = $respuesx[1];
            return response()->json($dataxxxx);
        }
    }
    public function getPedineon(Request $request)
    {
        if ($request->ajax()) {
            $respuest = [];
            $dataxxxx = $request->all();
            $existexx = ['elemtraz', 'vitahidr', 'vitalipi'];
            foreach ($dataxxxx['dataxxxx'] as $key => $value) {
                if (in_array($value['name'], $existexx)) {
                    $dataxxxx['campo_id'] = $value['name'] . '_cant';
                    // $respuest[]=$this->getCalculosFomula($dataxxxx);
                    $respuest[] = Validacionesajax::getFormulaciones($dataxxxx, $value['name']);
                }
            }

            return response()->json($respuest);
        }
    }
    public function getRequerimientoVolumenq()
    {
        $formulax = $this->getData();
        $campo_id = explode('_', $formulax['campo_id']);

        $respuest['cantvolu'] = ($campo_id[1] == 'cant') ?
            [$campo_id[0] . '_volu', ''] : // si se digitó requerimiento diario
            [$campo_id[0] . '_cant', '']; // si se digito volumen



        $dataxxxx = [
            'formulax' => [
                'cantvolu' => $respuest['cantvolu'],
                'unidadxx' => [$campo_id[0] . '_cant', ''],
                'menssage' => [$campo_id[0] . '_cant', 'hide', '']
            ], 'finalxxx' => []
        ];

        $formulay = $this->getCalculosFomula($formulax);

        $dataxxxx['finalxxx'] = $this->getCalculos($formulax);
        // $dataxxxx['formulax'] = Validacionesajax::formulaciones($formulax);
        ddd($formulay);
        foreach ($this->getCalculos($formulax) as $key => $value) {
            echo $value['campoxxx'] . '=>' . $value['valuexxx'] . ',<br>';
        }

    }

    public function getRequerimientoVolumen(Request $request)
    {
        if ($request->ajax()) {
            return Validacionesajax::getRango($request);
        }
    }
}
