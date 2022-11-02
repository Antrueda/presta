<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;

use App\Models\Reportes\Orden;
use App\Traits\Produccion\AlistamientoTrait;
use App\Traits\Produccion\InventarioTrait;
use App\Traits\Produccion\LoteTrait;
use Illuminate\Http\Request;



class LoteReporteController extends Controller
{
    use LoteTrait;
    use InventarioTrait;
    use AlistamientoTrait;
    private $opciones;
    private $bitacora;

    public function __construct()
    {
        $this->opciones['permisox'] = 'cerliblo';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['vocalesx'] = ['Á', 'É', 'Í', 'Ó', 'Ú'];
        $this->opciones['pestpadr'] = 1; // darle prioridad a las pestañas
        $this->opciones['tituhead'] = 'LOTES';
        $this->opciones['routxxxx'] = 'cerliblo';
        $this->opciones['slotxxxx'] = 'cerliblo';
        $this->opciones['rutacarp'] = 'Reporte.';
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['parametr'] = [];
        $this->opciones['carpetax'] = 'Reporte';
        /** botones que se presentan en los formularios */
        $this->opciones['botonesx'] = $this->opciones['rutacarp'] . 'Acomponentes.Botones.botonesx';
        /** informacion que se va a mostrar en la vista */
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.formulario';
        /** ruta que arma el formulario */
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.index';



        $this->opciones['tituloxx'] = "INFORMACI{$this->opciones['vocalesx'][3]}N";
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ALISTAMIENTO', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function indexreporte ()
    {
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ',
                'titulist' => 'Listado de Lotes',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'cabecera' =>[
                    [
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'LOTE', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ORDEN DE PRODUCCIÓN', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'FECHA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                 ],
                 'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'ordens.id'],
                    ['data' => 'ordeprod', 'name' => 'ordens.ordeprod'],
                    ['data' => 'created_at', 'name' => 'ordens.created_at'],
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
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapilote';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getOrdens($request);
        }
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function view($dataxxxx)
    {
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.' . $dataxxxx['accionxx'][0];
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Formulario.' . $dataxxxx['accionxx'][1];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.js']
        ];
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
             }
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $objetoxx)
    {

        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['ver', 'formulario']]);
    }


    public function edit(Orden $objetoxx)
    {
        if (auth()->user()->can($this->opciones['permisox'] . '-editar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'MODIFICAR REGISTRO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['editar', 'formulario'], 'padrexxx' => $objetoxx]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Orden $objetoxx)
    {

        return $this->grabar($request->all(), $objetoxx, 'Orden actualizada con exito');
    }
    public function store(Request $request)
    {
        return $this->grabar($request->all(), '', 'Orden creados con exito');
    }


}
