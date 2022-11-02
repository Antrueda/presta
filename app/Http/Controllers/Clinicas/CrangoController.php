<?php

namespace App\Http\Controllers\Clinicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\CrangoCrearRequest;
use App\Http\Requests\Clinica\CrangoEditarRequest;
use App\Models\Administracion\Rango\Rcodigo;
use App\Models\Clinica\Crango;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;
use App\Traits\ClinicaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrangoController extends Controller
{
    private $opciones;
    use ClinicaTrait;
    public function __construct()
    {

        $this->opciones = [
            'parapest' => [0,0,0,0],// paramentros para las pestañas
            'pestpadr' => 3,
            'cardheap' => '',
            'rowscols' => 'rowspancolspan',
            'tabsxxxx' => 'Clinicas.tabsxxxx.clinica.rango',
            'cardhead' => '', // titulo para las pestañas

            'permisox' => 'crango',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'Crear: Rango',
            'slotxxxy' => 'clinicax',
            'slotxxxx' => 'crango',
            'carpetax' => 'Rango',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware (['permission:' . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['rutaxxxx'] = 'crango';
        $this->opciones['routnuev'] = 'crango';
        $this->opciones['routxxxx'] = 'crango';
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
            ],

        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( SisClinica $padrexxx)
    {
        $this->opciones['sucursal'] = $padrexxx->id;
        $this->opciones['parapest'][0]  =$padrexxx->clinica_id;
        $this->opciones['cardhead'] = 'CLINICA: ' . $padrexxx->clinica->clinica;
        $this->opciones['cardheap'] = 'SUCURSAL: '.$padrexxx->sucursal;
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVO RANGO',
                'titulist' => 'LISTA DE RANGOS',
                'dataxxxx' => [

                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', [$padrexxx->id]),
                'cabecera' => [
                    [
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'CODIGO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'RANGO INCIA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'RANGO FINALIZA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'CONDICION', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rcodigos.id'],
                    ['data' => 'codiprod', 'name' => 'rcodigos.codiprod'],
                    ['data' => 'ranginic', 'name' => 'rangos.ranginic'],
                    ['data' => 'rangfina', 'name' => 'rangos.rangfina'],
                    ['data' => 'condicio', 'name' => 'condicios.condicio'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablacrango',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => 'crango',
                'parametr' => [$padrexxx->id],
            ];

        $this->opciones['parametr'] = [$padrexxx->id];
        $this->opciones['clinicax'] = $padrexxx->id;

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request,$padrexxx)
    {
        if ($request->ajax()) {
            $request->padrexxx=$padrexxx;
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getRangosAsignados($request);
        }
    }
    private function view($dataxxxx)
    {

        $this->opciones['clinicai']  =[$dataxxxx['padrexxx']->id=>$dataxxxx['padrexxx']->sucursal];
        $this->opciones['clinicax'] = $dataxxxx['padrexxx']->id;
        $this->opciones['sucursal'] = $dataxxxx['padrexxx']->id;
        $this->opciones['rangoxxx'] = Rcodigo::combo([
            'cabecera' => false, 'ajaxxxxx' => false,
            'clinicax' => $this->opciones['clinicax']
        ]);
        $this->opciones['parametr'] = [$dataxxxx['padrexxx']->id];
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['parapest'][0]  =$dataxxxx['padrexxx']->clinica->id;
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        $this->opciones['cardhead'] = 'CLINICA: ' . $dataxxxx['padrexxx']->clinica->clinica;
        $this->opciones['cardheap'] = 'SUCURSAL: '.$dataxxxx['padrexxx']->sucursal;
        // indica si se esta actualizando o viendo
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
            $this->opciones['clinicai']  =[$dataxxxx['modeloxx']->sis_clinica_id=>$dataxxxx['modeloxx']->sis_clinica->sucursal];

            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $this->opciones['pestpadr'] = 3;
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
    public function create(SisClinica $padrexxx)
    {
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
            return $this->view(['modeloxx' => '', 'accionxx' => 'Crear','padrexxx'=>$padrexxx]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrangoCrearRequest $request)
    {

        return $this->grabar(
            [
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
    public function show( Crango $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =  [
            'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', $this->opciones['parametr']],
            'formhref' => 2, 'tituloxx' => 'NUEVO RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Ver','padrexxx'=>$objetoxx->sis_clinica]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Crango $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Editar: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];

        $this->opciones['botoform'][] =  [
            'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', $objetoxx->sis_clinica->id],
            'formhref' => 2, 'tituloxx' => 'NUEVO RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Editar','padrexxx'=>$objetoxx->sis_clinica]);
    }

    private function grabar($dataxxxx)
    {
        $crangoxx = Crango::transaccion($dataxxxx);
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
    public function update(CrangoEditarRequest  $request, Crango $objetoxx)
    {
        return $this->grabar( [
            'requestx' => $request,
            'modeloxx' => $objetoxx,
            'menssage' => 'Registro actualizado con éxito'
        ]);
    }

    public function inactivate(Crango $objetoxx)
    {
        if (auth()->user()->can($this->opciones['permisox'] . '-borrar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'INACTIVAR', 'routingx' => [$this->opciones['routxxxx'] . '.borrar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Destroy','padrexxx'=>$objetoxx->sis_clinica]);
    }


    public function destroy(Request $request, Crango $objetoxx)
    {
        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['permisox'], [$objetoxx->sis_clinica_id])
            ->with('info', 'Rango inactivado correctamente');
    }

}
