<?php

namespace App\Http\Controllers\Produccion;

use App\Exceptions\GeneralException;
use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Cformula\Validacionesajax;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\RevisionEditarRequest;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\ProPreplibe;
use App\Models\Sistema\SisEsta;
use App\Traits\Alertas\AlertasTrait;
use App\Traits\Cformula\CalculosAjaxTrait;
use App\Traits\Cformula\CalculosFormulacion;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\AsignaRangoTrait;
use App\Traits\Produccion\InventarioTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use InventarioTrait;
    use AlertasTrait;
    use AsignaRangoTrait;
    use CalculosFormulacion;
    use CalculosAjaxTrait;
    use AsignaRangoTrait;
    private $dataform;
    public function __construct()
    {
        $this->dataform = new Dataformulario();
        $this->opciones = [

            'cardhead' => 'Revisión Formulación',
            'permisox' => 'revision',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Formulación',
            'slotxxxx' => 'revision',
            'carpetax' => 'Revision',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'revision';
        $this->opciones['routnuev'] = 'revision';
        $this->opciones['routxxxx'] = 'revision';

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
    public function index()
    {
        $this->opciones['paciente'] = '';
        // $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = false;
        $this->opciones['accionxx'] = 'index';
        // $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [];
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA FORMULACIóN',
                'titulist' => 'LISTA DE FORMULACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.revisado'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/revision',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'CÉDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'CLÍNICA'],
                    ['td' => 'REVISADO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'cedula', 'name' => 'pacientes.cedula'],
                    ['data' => 'nombres', 'name' => 'pacientes.nombres'],
                    ['data' => 'apellidos', 'name' => 'pacientes.apellidos'],
                    ['data' => 'clinica', 'name' => 'clinicas.clinica'],
                    ['data' => 'revisado', 'name' => 'revisado'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaformulaciones',
                'permisox' => 'revision',
                'routxxxx' => 'revision',
                'parametr' => [],
            ],
        ];
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {

        $quimfarm = ProPreplibe::orderBy('created_at', 'desc')
        ->with([
            'userevis' => function ($queryxxx) {
                $queryxxx->select(['id']);
            }
        ])
        ->first();
        if ($quimfarm == null && $objetoxx->userevis_id == null) {
            return redirect()
                ->route($this->opciones['routxxxx'], [])
                ->with('info', 'No se tiene un químico farmacéutico asignado');
        }
        $this->opciones['quimfarm'] = [$quimfarm->userevis->id => $quimfarm->userevis->name];
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        $this->opciones['calculos'] = $this->_dataxxx; //ddd($objetoxx->toArray());
        if ($nombobje != '') {
            // $this->opciones['calculos'] = $this->getArmarDataObjeto($objetoxx);
            // $this->opciones['calculos'] = $this->dataform->calculos($objetoxx);
            $this->opciones[$nombobje] = $objetoxx;
        }
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }


    public function edit(Cformula $objetoxx)
    {
        // ddd($objetoxx->toArray());

        if ($objetoxx->sis_esta_id == 2) {
            return redirect()
                ->route($this->opciones['routxxxx'], [])
                ->with('info', 'La formulación se encuentra inactiva');
        }
        $dataxxxx = explode(' ', $objetoxx->created_at)[0];

        if ($dataxxxx != date('Y-m-d')) {
            return redirect()
                ->route($this->opciones['routxxxx'], [])
                ->with('info', 'La formulación que intenta revisar es de una fecha diferente');
        }
        $crangoxx = $this->getRangosART(['cformula' => $objetoxx]);

        if ($crangoxx[0] == null) {
            return redirect()
                ->route($this->opciones['routxxxx'], [])
                ->with('info', "La clínica: {$objetoxx->sis_clinica->clinica->clinica} no tiene rango asignado para un volumen de {$crangoxx[1]}");
        }


        $this->opciones['tituloxx'] = 'Revisar: Formulación';
        $paciente = $objetoxx->paciente;
        $this->opciones['cardhead'] = $this->opciones['cardhead'] . ' Paciente: ' . $paciente->nombres . ' ' . $paciente->apellidos;
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $paciente,
                'furmulac' => $objetoxx,

            ]
        );
        $this->opciones['paciente'] = $paciente;
        $this->opciones['parametr'] = [$objetoxx->id];
        /**
         * solo se puede modificar la revision si la conciliacion no se ha realizado
         */
        if ($objetoxx->userevis_id == 0) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'LISTO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$objetoxx->id]],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'CANCELAR FORMULACION', 'routingx' => [$this->opciones['routxxxx'] . '.cancelar', [$objetoxx->id]],
                    'formhref' => 2, 'tituloxx' => 'CANCELAR FORMULACION', 'clasexxx' => 'btn btn-sm btn-danger'
                ];
        } else {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'IMPRIMIR ETIQUETA', 'routingx' => ['reporpdf.etiquetanpt', [$objetoxx->id]],
                    'formhref' => 2, 'tituloxx' => 'IMPRIMIR ETIQUETA', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }

        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    public function cancelar(Cformula $objetoxx)
    {
        $cformula = $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['routxxxx'], [])
            ->with('info', 'Formulación cancelada con éxito');
    }


    private function grabar($dataxxxx)
    {
        // $this->getRangos($dataxxxx);
        $cformula = $dataxxxx['modeloxx']->update($dataxxxx['dataxxxx']);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$dataxxxx['modeloxx']->id])
            ->with('info', $dataxxxx['infoxxxx']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RevisionEditarRequest  $request, Cformula $objetoxx) ///
    {

        $this->getAlerta(['objetoxx' => $objetoxx, 'tipoacci' => 3]);
        $crangoxx = $this->getRangosART(['cformula' => $objetoxx]);
        $quimfarm = ProPreplibe::orderBy('created_at', 'desc')
            ->with([
                'userevis' => function ($queryxxx) {
                    $queryxxx->select(['id']);
                }
            ])
            ->first();
        $dataxxxx = ['userevis_id' => $quimfarm->userevis->id, 'user_edita_id' => Auth::user()->id, 'crango_id' => $crangoxx[0]->id];
        return $this->grabar(['dataxxxx' => $dataxxxx, 'modeloxx' => $objetoxx, 'infoxxxx' => 'Se ha realizado la revisión con éxito']);
    }

    public function getRequerimientoVolumenq()
    {
        foreach ($this->getCalculos($this->getData()) as $key => $value) {
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
