<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\CalistamCrearRequest;
use App\Http\Requests\Produccion\CalistamEditarRequest;
use App\Models\Formulaciones\Orden;
use App\Models\Produccion\Calistam;
use App\Models\Sistema\SisEsta;
use App\Traits\Pdfs\PdfTrait;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\AlisConciTrait;
use App\Traits\Produccion\AlistamientoTrait;
use App\Traits\Produccion\InventarioTrait;
use Illuminate\Http\Request;

class AlistamientoController extends Controller
{
    use AlisConciTrait;



    private $opciones;
    use ProduccionTrait;
    use InventarioTrait;
    use AlistamientoTrait;
    use PdfTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'ALISTAMIENTOS',
            'permisox' => 'alistami',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Alistamiento',
            'slotxxxx' => 'alistami',
            'carpetax' => 'Alistamiento',
            'indecrea' => false,
            'esindexx' => false,
            'pestania' => []
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);
        $this->opciones['rutaxxxx'] = 'alistami';
        $this->opciones['routnuev'] = 'alistami';
        $this->opciones['routxxxx'] = 'alistami';
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ALISTAMIENTOS', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $this->getInactivarMlostesvencidos();
        $padrexxx = '';
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ALISTAMIENTO',
                'titulist' => 'LISTA DE ALISTAMIENTOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'puededit', 'dataxxxx' => auth()->user()->can('clinica-editar') ? true : false],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/alistamiento',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'PRODUCTO'],
                    ['td' => 'ORDEN DE SERVICIO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'calistams.id'],
                    ['data' => 'producto', 'name' => 'calistams.producto'],
                    ['data' => 'ordeprod', 'name' => 'ordens.ordeprod'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaordenes',
                'permisox' => 'alistami',
                'routxxxx' => 'alistami',
                'parametr' => [],
            ],

        ];
        $this->opciones['pestania'] = $this->getPestanias(['tablaxxx' => $this->opciones['routxxxx']]);

        $cabecera = Calistam::where('orden_id', Orden::ordendia())->first();
        if (isset($cabecera->id)) {
            $this->opciones['tablasxx'][0]['vercrear'] = false;
        }
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx']];

            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getAlistamientos($request);
        }
    }
    public function indexreporte()
    {
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['accionxx'] = 'index';
        $this->opciones['tituhead'] = 'Listado de Alistamientos';
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ',
                'titulist' => 'LISTA DE CONTROL DE PROCESOS Y PRODUCTOS TERMINADOS',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],

                        ['td' => 'Orden de producción', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'Observaciónn', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],

                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'ordens.id'],
                    ['data' => 'ordeprod', 'name' => 'ordens.ordeprod'],
                    ['data' => 'observac', 'name' => 'ordens.observac'],

                ],
                'tablaxxx' => 'datatable',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [],
            ]
        ];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.tabla']
        ];
        return view($this->opciones['rutacarp'] . 'pestaniax', ['todoxxxx' => $this->opciones]);
    }
    private function view($dataxxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];

        // indica si se esta actualizando o viendo
        if ($dataxxxx['objetoxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['objetoxx'];
            $this->opciones['ordenxxx'] = [$dataxxxx['objetoxx']->orden_id => $dataxxxx['objetoxx']->orden->ordeprod];
        }
        $this->opciones['pestania'] = $this->getPestanias(['tablaxxx' => $this->opciones['routxxxx']]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->opciones['ordenxxx'] = Orden::ordendia();
        $this->opciones['alistami'] = $this->getMlotesDlotesACT(['alisconc' => false, 'padrexxx' => 0]);
        // ddd($this->opciones['alistami']);
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicac'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['objetoxx' => '', 'accionxx' => 'Crear']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalistamCrearRequest $request)
    {
        return $this->grabar($request, '', 'Alistamiento creado con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calistam $objetoxx)
    {
        $this->opciones['alistami'] = $this->getMlotesDlotesACT(['alisconc' => false, 'padrexxx' => $objetoxx]);
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Ver']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calistam $objetoxx)
    {
        $this->opciones['alistami'] = $this->getMlotesDlotesACT(['alisconc' => false, 'padrexxx' => $objetoxx]);
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Editar']);
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $dataxxxx->request->add(['alisconc'=>false]);
        $cabecera =$this->setTransaccionACT($dataxxxx,  $objectx);
        $dataxxxx['dalistax'] = true;
        // Dalistam::transaccion($dataxxxx,  $cabecera);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$cabecera->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalistamEditarRequest  $request, Calistam $objetoxx)
    {
        return $this->grabar($request, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calistam $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
