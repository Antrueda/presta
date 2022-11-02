<?php

namespace App\Http\Controllers\Clinicas;

use App\Helpers\AlertasHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\ClinicaCrearRequest;
use App\Http\Requests\Clinica\ClinicaEditarRequest;
use App\Models\Clinica\Clinica;
use App\Models\Sistema\SisEsta;
use App\Traits\ClinicaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicaController extends Controller
{
    use ClinicaTrait;
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'pestpadr' => 1, // true indica si solo muestra la pestaña dependencias false muestra la pestaña padre y las hijas
            'permisox' => 'clinicax',
            'parametr' => [],
            'cardhead' => '',
            'cardheap' => '',
            'tabsxxxx'=>'Clinicas.tabsxxxx.clinica.header',
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'CLÍNICA',
            'carpetax' => 'Clinica',
            'slotxxxx' => 'clinicax',
            'slotxxxy' => 'clinicax',
            'tablaxxx' => 'datatable',
            'indecrea' => false, // false muestra las pestañas
            'esindexx' => false,
            'tituhead' => '',
            'fechcrea' => '',
            'fechedit' => '',
            'usercrea' => '',
            'useredit' => '',
            'conperfi' => '', // indica si la vista va a tener perfil
            'usuariox' => [],
            'rowscols' => 'rowspancolspan',
            'rutaxxxx' => 'clinicax',
            'routnuev' => 'clinicax',
            'routxxxx' => 'clinicax',
        ];

        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);



        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CLÍNICAS', 'clasexxx' => 'btn btn-sm btn-primary'
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

        $this->opciones['parametr'] = [];
        $this->opciones['tituhead'] = '';
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['padrexxx'] = '';
        $this->opciones['esindexx'] = true;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'CLÍNICA',
                'titulist' => 'LISTA DE CLÍNICAS',
                'dataxxxx' => [],

                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', $this->opciones['parametr']),
                'cabecera' => [
                    [
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'CLÍNICA', 'widthxxx' => '0', 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => '0', 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'clinicas.id'],
                    ['data' => 'clinica', 'name' => 'clinicas.clinica'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => $this->opciones['tablaxxx'],
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => $this->opciones['botoform'][0]['routingx'][1],
            ]

        ];
        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    public function getListado(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx'], 'clinicax'];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getListados($request);
        }
    }
    private function view($dataxxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['cardhead'] = $dataxxxx['modeloxx']->clinica;
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $this->opciones['pestpadr'] = 2;
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
    public function create()
    {
        $this->opciones['parametr'] = [];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['modeloxx' => '', 'accionxx' => 'Crear']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicaCrearRequest $request)
    {
        return $this->grabar([
            'requestx' => $request,
            'modeloxx' => '',
            'menssage' => 'Registro creado con éxito'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clinica $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Ver','padrexxx'=>$objetoxx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinica $objetoxx)
    {

        $this->opciones['parametr'] = [$objetoxx->id];
        if (auth()->user()->can($this->opciones['permisox'] . '-editar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'MODIFICAR REGISTRO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Editar','padrexxx'=>$objetoxx]);
    }

    private function grabar($dataxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Clinica::transaccion($dataxxxx)->id])
            ->with('info', $dataxxxx['menssage']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicaEditarRequest $request, Clinica $objetoxx)
    {
        return $this->grabar([
            'requestx' => $request,
            'modeloxx' => $objetoxx,
            'menssage' => 'Registro actualizado con éxito'
        ]);
    }

    public function inactivate(Clinica $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];
        if (auth()->user()->can($this->opciones['permisox'] . '-borrar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'INACTIVAR', 'routingx' => [$this->opciones['routxxxx'] . '.borrar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Destroy','padrexxx'=>$objetoxx]);
    }


    public function destroy(Request $request, Clinica $objetoxx)
    {
        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['slotxxxx'], [])
            ->with('info', 'Clínica inactivada correctamente');
    }


    public function dv(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->digitoverificacion($request->nitxxxxx));
        }
    }

    public function digitoverificacion($nitxxxxx)
    {
        $primosxx = [3, 7, 13, 17, 19, 23, 29, 37, 41, 43, 47, 53, 59, 67, 71];
        $lengnitx = strlen($nitxxxxx);
        $sumaxxxx = 0;
        for ($i = 0; $i < $lengnitx; $i++) {
            $sumaxxxx += $primosxx[$i] * substr($nitxxxxx, $lengnitx - ($i + 1), 1);
        }
        $moduloxx = fmod($sumaxxxx, 11);
        $digitoxx = 0;
        if ($moduloxx == 0 || $moduloxx == 1) {
            $digitoxx = $moduloxx;
        } else {
            $digitoxx = 11 - $moduloxx;
        }
        return ['digitoxx' => $digitoxx];
    }

    public function getAlertas(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(AlertasHelper::alertas());
        }
    }
}
