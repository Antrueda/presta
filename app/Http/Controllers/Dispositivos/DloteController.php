<?php

namespace App\Http\Controllers\Dispositivos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dispositivos\DloteCrearRequest;
use App\Http\Requests\Dispositivos\DloteEditarRequest;
use App\Models\Dispositivos\Dinvima;
use App\Models\Dispositivos\Dlote;
use App\Models\Dispositivos\Dmarca;
use App\Models\Sistema\SisEsta;

class DloteController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'dlote',
            'parametr' => [],
            'rutacarp' => 'Dispositivos.',
            'tituloxx' => 'Crear: Lote',
            'carpetax' => 'Dlote',
            'slotxxxx' => 'dlote',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);


        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'dlote';
        $this->opciones['routnuev'] = 'dlote';
        $this->opciones['routxxxx'] = 'dlote';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'Volver a lotes', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['dmarca', []],
                'formhref' => 2, 'tituloxx' => 'Volver a marcas', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['dmedico', []],
                'formhref' => 2, 'tituloxx' => 'Volver a dispositivos médicos', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'accitabl' => true,
                'titunuev' => 'Nuevo lote',
                'titulist' => 'Lista de lotes',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'urlxxxxx' => 'api/dmedico/dlote',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'LOTE'],
                    ['td' => 'MARCA'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'dlotes.id'],
                    ['data' => 'lotexxxx', 'name' => 'dlotes.lotexxxx'],
                    ['data' => 'marcaxxx', 'name' => 'dmarcas.marcaxxx'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tabladlote',
                'permisox' => 'dlote',
                'routxxxx' => 'dlote',
                'parametr' => [$padrexxx],
            ],

        ];
        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['marcaxxx'] = Dmarca::combo(['padrexxx' => $this->opciones['padrexxx'], 'cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
        }
        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($padrexxx)
    {
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['botoform'][0]['routingx'][1] = [$padrexxx];
        $this->opciones['botoform'][1]['routingx'][1] = [$padrexxx];
        $this->opciones['botoform'][2]['routingx'][1] = [$padrexxx];
        $this->opciones['parametr'] = [$padrexxx];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Crear', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view('', '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($padrexxx, DloteCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['medicame_id'] = $padrexxx;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padrexxx, Dlote $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Lote';
        $this->opciones['botoform'][0]['routingx'][1] = [$padrexxx];
        $this->opciones['botoform'][1]['routingx'][1] = [$padrexxx];
        $this->opciones['botoform'][2]['routingx'][1] = [$padrexxx];
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx, $objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($padrexxx, Dlote $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Editar: Lote';
        $this->opciones['botoform'][0]['routingx'][1] = [$padrexxx];
        $this->opciones['botoform'][1]['routingx'][1] = [$padrexxx];
        $this->opciones['botoform'][2]['routingx'][1] = [$padrexxx];
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx, $objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Editar', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $padrexxx = Dlote::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$padrexxx->dmarca->dmedico_id, $padrexxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($padrexxx, DloteEditarRequest $request, Dlote $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dlote $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
