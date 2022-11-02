<?php

namespace App\Http\Controllers\Clinicas;


use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\SisClinicaCrearRequest;
use App\Http\Requests\Clinica\SisClinicaEditarRequest;
use App\Models\Clinica\Clinica;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use App\Traits\ClinicaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SisClinicaController extends Controller
{
    use ClinicaTrait;
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'parapest' => [0,0,0,0],// paramentros para las pestañas
            'pestpadr' => 2, // true indica si solo muestra la pestaña dependencias false muestra la pestaña padre y las hijas
            'permisox' => 'sisclini',
            'parametr' => [],
            'cardhead' => '',
            'cardheap' => '',
            'tabsxxxx' => 'Clinicas.tabsxxxx.clinica.header',
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'SUCURSALES',
            'carpetax' => 'Sucursal',
            'slotxxxx' => 'sisclini',
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
            'rutaxxxx' => 'sisclini',
            'routnuev' => 'sisclini',
            'routxxxx' => 'sisclini',
        ];

        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);



        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A SUCURSALES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($padrexxx)
    {
        $this->opciones['cardhead'] = Clinica::find($padrexxx)->clinica;
        $this->opciones['parametr'] = [$padrexxx];

        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['padrexxx'] = '';
        $this->opciones['esindexx'] = true;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'SUCURSAL',
                'titulist' => 'LISTA DE SUCURSALES',
                'dataxxxx' => [],

                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', $this->opciones['parametr']),
                'cabecera' => [
                    [
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'SUCURSAL', 'widthxxx' => '0', 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => '0', 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'sis_clinicas.id'],
                    ['data' => 'sucursal', 'name' => 'sis_clinicas.sucursal'],
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
            $request->routexxx = [$this->opciones['routxxxx'], 'sisclini'];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getSucursales($request);
        }
    }
    private function view($dataxxxx)
    {
        $this->opciones['tituloxx'] = 'SUCURSAL';
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['departam'] = Departamento::combo(['cabecera' => false, 'ajaxxxxx' => false]);

        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        $departam = 0;
        // indica si se esta actualizando o viendo
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['sucursal'] = $dataxxxx['modeloxx']->id;
            $this->opciones['parapest'][0]=$dataxxxx['modeloxx']->clinica_id;
            $this->opciones['parametr'] =$dataxxxx['modeloxx']->id;
            $this->opciones['clinicai'] = [$dataxxxx['modeloxx']->clinica_id=>$dataxxxx['modeloxx']->clinica->clinica];
            $departam = $dataxxxx['modeloxx']->departamento_id = $dataxxxx['modeloxx']->municipio->departamento_id;

            $this->opciones['botoform'][0]['routingx'][1] = $dataxxxx['modeloxx']->clinica_id;
            $this->opciones['cardhead'] = 'CLINICA: '.$dataxxxx['modeloxx']->clinica->clinica;
            $this->opciones['cardheap'] = 'SUCURSAL: '.$dataxxxx['modeloxx']->sucursal;
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $this->opciones['pestpadr'] = 3;
            if (auth()->user()->can($this->opciones['permisox'] . '-crear')) {
                $this->opciones['botoform'][] =
                    [
                        'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', $this->opciones['parametr'] ],
                        'formhref' => 2, 'tituloxx' => 'IR A CREAR NUEVO REGISTRO', 'clasexxx' => 'btn btn-sm btn-primary'
                    ];
            }

            $this->opciones['fechcrea'] = $dataxxxx['modeloxx']->created_at;
            $this->opciones['fechedit'] = $dataxxxx['modeloxx']->updated_at;
            $this->opciones['usercrea'] = $dataxxxx['modeloxx']->creador->name;
            $this->opciones['useredit'] = $dataxxxx['modeloxx']->editor->name;
        }


        $this->opciones['municipi'] = Municipio::combo(['departam' => $departam, 'cabecera' => true, 'ajaxxxxx' => false]);

        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Clinica $padrexxx)
    {
        $this->opciones['padrexxx']=$padrexxx->id;
        $this->opciones['clinicai'] = [$padrexxx->id=>$padrexxx->clinica];
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'] = [$padrexxx->id];
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
    public function store(SisClinicaCrearRequest $request)
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
    public function show(SisClinica $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Ver', 'padrexxx' => $objetoxx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SisClinica $objetoxx)
    {

        $this->opciones['parametr'] = [$objetoxx->id];
        if (auth()->user()->can($this->opciones['permisox'] . '-editar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'MODIFICAR REGISTRO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Editar', 'padrexxx' => $objetoxx]);
    }

    private function grabar($dataxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [SisClinica::transaccion($dataxxxx)->id])
            ->with('info', $dataxxxx['menssage']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SisClinicaEditarRequest $request, SisClinica $objetoxx)
    {
        return $this->grabar([
            'requestx' => $request,
            'modeloxx' => $objetoxx,
            'menssage' => 'Registro actualizado con éxito'
        ]);
    }

    public function inactivate(SisClinica $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];
        if (auth()->user()->can($this->opciones['permisox'] . '-borrar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'INACTIVAR', 'routingx' => [$this->opciones['routxxxx'] . '.borrar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Destroy', 'padrexxx' => $objetoxx]);
    }


    public function destroy(Request $request, SisClinica $objetoxx)
    {

        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['permisox'], [$objetoxx->clinica_id])
            ->with('info', 'Sucursal inactivada correctamente');
    }

    public function getMunicipio(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Municipio::combo(['departam' =>$request->departam==''?0:$request->departam, 'cabecera' => true, 'ajaxxxxx' => true]));
        }
    }
}
