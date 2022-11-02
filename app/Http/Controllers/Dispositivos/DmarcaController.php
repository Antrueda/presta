<?php

namespace App\Http\Controllers\Dispositivos;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dispositivos\DmarcaCrearRequest;
use App\Http\Requests\Dispositivos\DmarcaEditarRequest;
use App\Models\Dispositivos\Dmarca;
use App\Models\Sistema\SisEsta;

class DmarcaController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'dmarca',
            'parametr' => [],
            'rutacarp' => 'Dispositivos.',
            'tituloxx' => 'Crear: Dispositivo Médico',
            'carpetax' => 'Dmarca',
            'slotxxxx' => 'dmarca',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'dmarca';
        $this->opciones['routnuev'] = 'dmarca';
        $this->opciones['routxxxx'] = 'dmarca';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
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
                'titunuev' => 'Nueva Marca',
                'titulist' => 'Lista de Marcas',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'].$this->opciones['carpetax'].'.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'urlxxxxx' => 'api/dmedico/dmarca',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'MARCA'],
                    ['td' => 'REGISTRO INVIMA'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'dmarcas.id'],
                    ['data' => 'marcaxxx', 'name' => 'dmarcas.marcaxxx'],
                    ['data' => 'reginvim', 'name' => 'dmarcas.reginvim'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tabladmarca',
                'permisox' => 'dmarca',
                'routxxxx' => 'dmarca',
                'parametr' => [$padrexxx],
            ],

        ];
        $this->opciones['accionxx']='index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
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
        $this->opciones['botoform'][0]['routingx'][1]=[$padrexxx];
        $this->opciones['parametr'] = [$padrexxx];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Crear', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp']. 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($padrexxx,DmarcaCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['dmedico_id']=$padrexxx;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padrexxx,Dmarca $objetoxx)
    {
        $this->opciones['tituloxx']='Ver: Marca';
        $this->opciones['botoform'][0]['routingx'][1]=[$padrexxx];
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx,$objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($padrexxx,Dmarca $objetoxx)
    {
        $this->opciones['tituloxx']='Editar: Marca';
        $this->opciones['botoform'][0]['routingx'][1]=[$padrexxx];
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx,$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Editar', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $padrexxx=Dmarca::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$padrexxx->dmedico_id,$padrexxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($padrexxx,DmarcaEditarRequest $request, Dmarca $objetoxx)
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
    public function destroy(Dmarca $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
