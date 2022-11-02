<?php

namespace App\Http\Controllers\Clinicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\RemisionCrearRequest;
use App\Http\Requests\Clinica\RemisionEditarRequest;
use App\Models\Clinica\Clinica;
use App\Models\Produccion\ProPreplibe;
use App\Models\Remision;
use App\Models\Sistema\SisEsta;
use App\Traits\Clinica\RemisionTrait;
use App\Traits\ClinicaTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CremisionController extends Controller
{
    private $opciones;
    use ClinicaTrait;
    use RemisionTrait;
    public function __construct()
    {
        $this->opciones['pestpadr'] = 2;
        $this->opciones['parapest'] = [0, 0, 0, 0]; // paramentros para las pestañas
        $this->opciones['permisox'] = 'cremision';
        $this->opciones['routxxxx'] = 'cremision';
        $this->opciones['rutacarp'] = 'Clinicas.';
        $this->opciones['carpetax'] = 'Remision';
        $this->opciones['slotxxxx'] =  $this->opciones['permisox'];
        $this->opciones['slotxxxy'] = 'clinicax';
        $this->opciones['tabsxxxx'] = 'Clinicas.tabsxxxx.clinica.header';
        $this->opciones['tituloxx'] = 'REMISIONES';
        $this->opciones['fechcrea'] = '';
        $this->opciones['fechedit'] = '';
        $this->opciones['usercrea'] = '';
        $this->opciones['useredit'] = '';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A REMISIONES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],

        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clinica $padrexxx)
    {
        $tienremi = Remision::where('created_at', 'LIKE', date('Y-m-d') . '%')->first();
        $this->opciones['parapest'][0]  = $padrexxx->id;
        $this->opciones['cardhead'] = 'CLÍNICA: ' . $padrexxx->clinica;
        $this->opciones['cardheap'] = 'CLÍNICA: ' . $padrexxx->clinica;
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVA REMISIÓN',
                'titulist' => 'LISTA DE REMISIONES',
                'dataxxxx' => [],
                'accitabl' => true,
                'vercrear' => isset($tienremi->id) == true ? false : true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', [$padrexxx->id]),
                'cabecera' => [[
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ORDEN', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                ]],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'remisions.id'],
                    ['data' => 'ordeprod', 'name' => 'remisions.ordeprod'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'datatable',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [$padrexxx->id],
            ];

        $this->opciones['parametr'] = [$padrexxx->id];
        $this->opciones['clinicax'] = $padrexxx->id;

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request, $padrexxx)
    {
        if ($request->ajax()) {
            $request->padrexxx = $padrexxx;
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getRemisiones($request);
        }
    }
    private function view($dataxxxx)
    {

        $this->opciones['tituloxx'] = 'REMISIÓN';
        $this->opciones['clinicai']  = [$dataxxxx['padrexxx']->id => $dataxxxx['padrexxx']->clinica];
        $this->opciones['clinicax'] = $dataxxxx['padrexxx']->id;
        $this->opciones['sucursal'] = $dataxxxx['padrexxx']->id;
        $this->opciones['rangoxxx'] = $this->getOrdenes(['padrexxx' => $dataxxxx['padrexxx']->id]);
        $this->opciones['parametr'] = [$dataxxxx['padrexxx']->id];
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['padrexxx']  = $dataxxxx['padrexxx']->id;
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        $this->opciones['cardhead'] = 'CLÍNICA: ' . $dataxxxx['padrexxx']->clinica;
        $this->opciones['cardheap'] = 'CLÍNICA: ' . $dataxxxx['padrexxx']->clinica;
        // indica si se esta actualizando o viendo
        if ($dataxxxx['modeloxx'] != '') {
            $quimfarm = $dataxxxx['modeloxx']->quimfarm;
            $this->opciones['quimfarm'] = [$quimfarm->id => $quimfarm->name];
            $this->opciones['rangoxxx'] = [$dataxxxx['modeloxx']->orden_id => $dataxxxx['modeloxx']->orden->ordeprod];
            $this->opciones['parametr'][1] = $dataxxxx['modeloxx']->id;
            $this->opciones['clinicai']  = [$dataxxxx['modeloxx']->clinica_id => $dataxxxx['modeloxx']->clinica->clinica];
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];

            if (auth()->user()->can($this->opciones['permisox'] . '-crear')) {
                $this->opciones['botoform'][] =
                    [
                        'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', [$dataxxxx['padrexxx']->id]],
                        'formhref' => 2, 'tituloxx' => 'IR A CREAR NUEVO REGISTRO', 'clasexxx' => 'btn btn-sm btn-primary'
                    ];
            }

            $this->opciones['fechcrea'] = $dataxxxx['modeloxx']->created_at;
            $this->opciones['fechedit'] = $dataxxxx['modeloxx']->updated_at;
            $this->opciones['usercrea'] = $dataxxxx['modeloxx']->creador->name;
            $this->opciones['useredit'] = $dataxxxx['modeloxx']->editor->name;
        }

        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Clinica $padrexxx)
    {
        $quimfarm = ProPreplibe::select()->orderBy('created_at','asc')->first();
        if ($quimfarm == null) {
            return redirect()
                ->route($this->opciones['permisox'], [$padrexxx->id])
                ->with('info', 'No se tiene un químico farmacéutico asignado');
        }
        $this->opciones['quimfarm'] = [$quimfarm->id => $quimfarm->name];

        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['modeloxx' => '', 'accionxx' => 'Crear', 'padrexxx' => $padrexxx]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemisionCrearRequest $request)
    {

        return $this->grabar(
            [
                'requestx' => $request,
                'modeloxx' => '',
                'menssage' => 'Remisión creada con éxito'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Remision $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =  [
            'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', $objetoxx->clinica_id],
            'formhref' => 2, 'tituloxx' => 'NUEVO RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Ver', 'padrexxx' => $objetoxx->clinica]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Remision $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Editar: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $objetoxx->clinica_id],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];


        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Editar', 'padrexxx' => $objetoxx->clinica]);
    }

    private function grabar($dataxxxx)
    {
        $crangoxx = Remision::transaccion($dataxxxx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$crangoxx->id])
            ->with('info', $dataxxxx['menssage']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RemisionEditarRequest  $request, Remision $objetoxx)
    {
        return $this->grabar([
            'requestx' => $request,
            'modeloxx' => $objetoxx,
            'menssage' => 'Registro actualizado con éxito'
        ]);
    }

    public function inactivate(Remision $objetoxx)
    {
        if (auth()->user()->can($this->opciones['permisox'] . '-borrar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'INACTIVAR', 'routingx' => [$this->opciones['routxxxx'] . '.borrar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Destroy', 'padrexxx' => $objetoxx->sis_clinica]);
    }


    public function destroy(Request $request, Remision $objetoxx)
    {
        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['permisox'], [$objetoxx->sis_clinica_id])
            ->with('info', 'Rango inactivado correctamente');
    }
}
